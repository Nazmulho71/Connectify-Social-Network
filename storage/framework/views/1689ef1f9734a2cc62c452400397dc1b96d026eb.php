<div class="media">
    <a href="<?php echo e(route('profile.index', ['user' => $user])); ?>" class="float-left">
        <img src="<?php echo e($user->getAvatarUrl()); ?>" alt="<?php echo e($user->first_name . ' ' . $user->last_name); ?>" class="mr-3">
    </a>
    
    <div class="media-body">
        <h5 class="mt-0 mb-1">
            <a id="user_q" href="<?php echo e(route('profile.index', ['user' => $user])); ?>"><?php echo e($user->first_name . ' ' . $user->last_name); ?></a>
        </h5>

        <p class="mb-0"><?php echo e($user->location); ?></p>
    </div>
</div><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/includes/user/_userblock.blade.php ENDPATH**/ ?>