


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php echo e(__('Edit products')); ?>

                </div>

                
                <div class="card-body">
                <form action="<?php echo e(route('products.update', $product['id'])); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo e($product['title']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="body_html">Description</label>
                            <textarea class="form-control" id="body_html" name="body_html" required><?php echo e($product['body_html']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inventory_quantity">Quantity</label>
                            <input type="number" class="form-control" id="inventory_quantity" name="inventory_quantity" value="<?php echo e($product['variants'][0]['inventory_quantity']); ?>" required>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abder\Desktop\for interview\test)\resources\views/editproducts.blade.php ENDPATH**/ ?>