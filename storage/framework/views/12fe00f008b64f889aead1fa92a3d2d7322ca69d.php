<?php $__env->startSection('title', 'Timeline - Connectify'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="<?php echo e(route('status.post')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <textarea class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status" id="status" rows="5" placeholder="What's up <?php echo e(auth()->user()->first_name); ?>?"><?php echo e(old('status')); ?></textarea>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Post Status" />
                    </form>
                </div>
            </div>
            <hr class="mb-5" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php if(!$statuses->count()): ?>
                <p class="text-muted">There's nothing in your timeline yet!</p>
            <?php else: ?>
                <?php echo $__env->make('includes.user._status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/timeline/index.blade.php ENDPATH**/ ?>