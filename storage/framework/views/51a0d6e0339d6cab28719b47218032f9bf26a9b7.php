

<?php $__env->startSection('title', '404 - Page Not Found | Connectify'); ?>

<?php $__env->startSection('content'); ?>
    <h3>Oops, It's Missing! (404)</h3>
    <p class="text-muted"><a id="user_q" href="<?php echo e(route('home')); ?>">Go home</a></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/errors/404.blade.php ENDPATH**/ ?>