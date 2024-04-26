
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col">
                            {{ __('Dashboard') }}
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                Add Product
                            </button>
                        </div>

                        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="body_html">Description</label>
                                                <textarea class="form-control" id="body_html" name="body_html" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inventory_quantity">Quantity</label>
                                                <input type="number" class="form-control" id="inventory_quantity" name="inventory_quantity" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" class="form-control-file" id="image" name="image">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped mt-3 text-center" id="daTable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (is_array($products) && count($products) > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <td>    @if (!empty($product['image']))

                                    <img src="{{ $product['image']['src'] }}" alt="{{ $product['title'] }}" class="product-image">                                        @endif
                                    </td>
                                    <td>{{ $product['title'] }}</td>                                
                                    <td>{{ strip_tags($product['body_html']) }}</td>
                                    <td>{{ isset($product['variants'][0]['inventory_quantity']) ? $product['variants'][0]['inventory_quantity'] : 0 }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('products.destroy', $product['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js">
</script>
<script>
$(document).ready( function () {
    $('#daTable').DataTable();
} )
</script>
@endsection