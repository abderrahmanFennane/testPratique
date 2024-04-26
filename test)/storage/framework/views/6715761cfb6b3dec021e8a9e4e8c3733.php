

<?php $__env->startSection('content'); ?>

<style>=
        img {
            width: 100px;  
            height: 100px; 
            object-fit: cover; 
        }
    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <!-- <?php echo e(__('You are logged in!')); ?> -->
                    <!-- Add Button -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        Add Product
                    </button>

                    <!-- Add Product Modal -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form id="productForm" action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="product_id" name="id">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="body_html" class="form-label">Body</label>
                                <textarea class="form-control" id="body_html" name="body_html" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inventory_quantity" class="form-label">Inventory Quantity</label>
                                <input type="number" class="form-control" id="inventory_quantity" name="inventory_quantity" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">#</th>
                                <th scope="col">description</th>
                                <th scope="col">Inventory Quantity</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($products) && count($products) > 0): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>    <?php if(!empty($product['image'])): ?>

                                        <img src="<?php echo e($product['image']['src']); ?>" alt="<?php echo e($product['title']); ?>" width="90">
                                        <?php endif; ?>
                                    </td>  
                                    <td><?php echo e($product['title']); ?></td>                              
                                    <td><?php echo e(strip_tags($product['body_html'])); ?></td>
                                    <td><?php echo e(isset($product['variants'][0]['inventory_quantity']) ? $product['variants'][0]['inventory_quantity'] : 0); ?></td>
                                    <td>
                                    <a href="<?php echo e(route('products.show', $product['id'])); ?>" class="btn btn-primary">Edit</a>
                                    <form action="<?php echo e(route('products.destroy', $product['id'])); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No products found.</td>
                            </tr>
                        <?php endif; ?>
                            </tbody>
                    </table>
        

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abder\Desktop\for interview\test\testPratique\test\resources\views/home.blade.php ENDPATH**/ ?>