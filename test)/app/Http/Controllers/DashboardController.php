<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Product;
use DateTime;  

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Method to get Shopify API client
    private function getShopifyClient()
    {
        return new Client([
        ]);
    }
    
    // Index method to display data and store it into the database
    public function index()
    {
        $client = $this->getShopifyClient();

        $response = $client->request('GET', 'products.json');

        $products = json_decode($response->getBody()->getContents(), true);

        foreach ($products['products'] as $productData) {
            $dbData = [];
            foreach ($productData as $key => $value) {
                if (in_array($key, (new Product)->getFillable())) {
                    if ($key === 'published_at' && $value !== null) {
                        $date = new DateTime($value);
                        $value = $date->format('Y-m-d H:i:s');
                    }
                    $dbData[$key] = $value;
                }
            }
            if (isset($dbData['image']) && is_array($dbData['image'])) {
                $dbData['image'] = json_encode($dbData['image']);
            }
            if (isset($productData['variants'][0]['inventory_quantity'])) {
                $dbData['inventory_quantity'] = $productData['variants'][0]['inventory_quantity'];
            } else {
                $dbData['inventory_quantity'] = 0;
            }
            if (isset($dbData['id'])) {
                Product::updateOrCreate(
                    ['id' => $dbData['id']],  
                    $dbData  
                );
            }
        }

        return view('home', ['products' => $products['products']]);
    }

    // Store method to add a new product
    public function store(Request $request)
    {
        $client = $this->getShopifyClient();
    
        $productResponse = $client->request('POST', "products.json", [
            'json' => [
                'product' => [
                    'title' => $request->title,
                    'body_html' => $request->body_html,
                    'variants' => [
                        [
                            'inventory_management' => 'shopify',
                            'inventory_quantity' => $request->inventory_quantity,
                        ],
                    ],
                ]
            ]
        ]);
    
        $product = json_decode($productResponse->getBody()->getContents(), true)['product'];
    
        if ($request->hasFile('image')) {
            $imageData = base64_encode(file_get_contents($request->file('image')->path()));
    
            $client->request('POST', "products/{$product['id']}/images.json", [
                'json' => [
                    'image' => [
                        'attachment' => $imageData
                    ]
                ]
            ]);
        }
    
        return redirect()->route('home');
    }

    // Show method to display a single product for editing
    public function show($id)
    {
        $client = $this->getShopifyClient();
        $response = $client->request('GET', "products/{$id}.json");
        $product = json_decode($response->getBody()->getContents(), true)['product'];
        return view('editproducts', ['product' => $product]);

    }

    // Update method to update product details
    public function update(Request $request, $id)
    {
        $client = $this->getShopifyClient();
    
        // Update product details
        $productData = [
            'title' => $request->input('title'),
            'body_html' => $request->input('body_html'),
            'variants' => [
                [
                    'inventory_quantity' => $request->input('inventory_quantity'),
                ],
            ],
        ];
        $productResponse = $client->request('PUT', "products/{$id}.json", [
            'json' => ['product' => $productData]
        ]);

        // Uncomment the following code to handle image update
        // if ($request->hasFile('image')) {
        //     // Delete existing images
        //     $client->request('DELETE', "products/{$product['id']}/images.json");
        //     // Add new image
        //     $imageData = base64_encode(file_get_contents($request->file('image')->path()));
        //     $client->request('POST', "products/{$product['id']}/images.json", [
        //         'json' => [
        //             'image' => [
        //                 'attachment' => $imageData
        //             ]
        //         ]
        //     ]);
        // }

        return redirect()->route('home');
    }

    // Method to delete a product
    public function destroy($id)
    {
        $client = $this->getShopifyClient();
        $client->request('DELETE', "products/{$id}.json");
    
        return redirect()->route('home');
    }
}
