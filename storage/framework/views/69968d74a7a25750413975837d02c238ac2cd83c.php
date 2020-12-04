

<?php $__env->startSection('title'); ?>
    <?php echo e($user->first_name . ' ' . $user->last_name); ?> - Profile | Connectify
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-5">
            <?php echo $__env->make('includes.user._userblock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <hr />

            <?php if(!$statuses->count()): ?>
                <p class="text-muted"><?php echo e($user->first_name); ?> hasn't posted anything yet!</p>
            <?php else: ?>
                <?php echo $__env->make('includes.user._status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
        
        <div class="col-md-4 offset-md-3">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user() != $user): ?>
                    <?php if(auth()->user()->hasFriendRequestPending($user)): ?>
                        <p>Waiting for <?php echo e($user->first_name); ?> to accept your request.</p>
                    <?php elseif(auth()->user()->isFriendsWith($user)): ?>
                        <p>You and <?php echo e($user->first_name); ?> are friends.</p>
                        <form action="<?php echo e(route('friend.remove', $user)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="submit" value="Remove Friend" class="btn btn-danger mb-3" />
                        </form>
                    <?php elseif(auth()->user()->hasFriendRequestRecieved($user)): ?>
                        <a href="<?php echo e(route('friend.accept', $user)); ?>" class="btn btn-primary mb-3">Accept request</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('friend.add', $user)); ?>" class="btn btn-primary mb-3">Add as friend</a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <h4 class="text-muted mb-4"><b><?php echo e($user->first_name); ?></b>'s friends</h4>

            <?php if(!$user->friends()->count()): ?>
                <p><?php echo e($user->first_name); ?> has no friends!</p>
            <?php else: ?>
                <?php $__currentLoopData = $user->friends(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-3">
                        <?php echo $__env->make('includes.user._userblock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/profile/index.blade.php ENDPATH**/ ?>