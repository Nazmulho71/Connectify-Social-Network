<?php if(session('info')): ?>
    <div class="alert alert-info mb-4" role="alert">
        <?php echo e(session('info')); ?>

    </div>
<?php endif; ?>

<?php if(session('primary')): ?>
    <div class="alert alert-primary mb-4" role="alert">
        <?php echo e(session('primary')); ?>

    </div>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success mb-4" role="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('warning')): ?>
    <div class="alert alert-warning mb-4" role="alert">
        <?php echo e(session('warning')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger mb-4" role="alert">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/includes/_alerts.blade.php ENDPATH**/ ?>