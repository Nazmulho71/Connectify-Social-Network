<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Site Favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('favicon.png')); ?>" type="image/x-icon">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/ba4be11306.js" crossorigin="anonymous"></script>

        <title><?php echo $__env->yieldContent('title'); ?></title>

    </head>
    <body class="bg-light text-dark">

        <?php echo $__env->make('includes._nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <div class="container">
            <?php echo $__env->make('includes._alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <!-- Bootstrap JavaScript -->
        <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>

        <!-- Custom JavaScript -->
        <script src="<?php echo e(asset('js/app.js')); ?>" type="text/javascript"></script>
        
    </body>
</html><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/layouts/app.blade.php ENDPATH**/ ?>