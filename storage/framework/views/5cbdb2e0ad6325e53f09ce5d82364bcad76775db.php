

<?php $__env->startSection('title', 'Search Results | Connectify'); ?>

<?php $__env->startSection('content'); ?>
    <?php if($users->count()): ?>
        <h4 class="mb-4"><b><?php echo e($users->count()); ?></b> <?php echo e(Str::plural('result', $users->count())); ?> found for <b><?php echo e($q); ?></b></h4>

        <div class="row">
            <div class="col-md-12">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-3">
                        <?php echo $__env->make('includes.user._userblock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php else: ?>
        <h4 class="mb-3">Sorry, no results found!</h4>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/search/results.blade.php ENDPATH**/ ?>