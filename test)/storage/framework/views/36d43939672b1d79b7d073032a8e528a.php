

<?php $__env->startSection('content'); ?>
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

                    <form action="<?php echo e(route('products.update', $product['id'])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="hidden" id="title" name="title" value="<?php echo e($product['id']); ?>" class="form-control">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="<?php echo e($product['title']); ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="body_html">Body</label>
                            <textarea id="body_html" name="body_html" class="form-control"><?php echo e(strip_tags($product['body_html'])); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inventory_quantity">Inventory Quantity</label>
                            <input type="number" id="inventory_quantity" name="inventory_quantity" value="<?php echo e($product['variants'][0]['inventory_quantity']); ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abder\Desktop\for interview\test\testPratique\test\resources\views/editproducts.blade.php ENDPATH**/ ?>