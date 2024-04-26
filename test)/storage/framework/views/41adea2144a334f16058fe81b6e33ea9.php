


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col">
                            <?php echo e(__('Dashboard')); ?>

                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                Add Product
                            </button>
                        </div>

                        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
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
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

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
                        <?php if(is_array($products) && count($products) > 0): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>    <?php if(!empty($product['image'])): ?>

                                    <img src="<?php echo e($product['image']['src']); ?>" alt="<?php echo e($product['title']); ?>" class="product-image">                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($product['title']); ?></td>                                
                                    <td><?php echo e(strip_tags($product['body_html'])); ?></td>
                                    <td><?php echo e(isset($product['variants'][0]['inventory_quantity']) ? $product['variants'][0]['inventory_quantity'] : 0); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('products.show', $product['id'])); ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="<?php echo e(route('products.destroy', $product['id'])); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abder\Desktop\for interview\test)\resources\views/home.blade.php ENDPATH**/ ?>