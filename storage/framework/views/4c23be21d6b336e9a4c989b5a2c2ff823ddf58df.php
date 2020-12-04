<?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="media">
                <a href="<?php echo e(route('profile.index', $status->user)); ?>" class="float-left" id="user_q">
                    <img class="mr-3" src="<?php echo e($status->user->getAvatarUrl()); ?>" alt="<?php echo e($status->user->first_name . ' ' . $status->user->last_name); ?>" />
                </a>
                <div class="media-body">
                    <h5 class="mt-0"><a id="user_q" href="<?php echo e(route('profile.index', $status->user)); ?>"><?php echo e($status->user->first_name); ?></a></h5>
                    <p><?php echo e($status->body); ?></p>

                    <ul class="text-muted list-inline">
                        <li class="list-inline-item"><?php echo e($status->created_at->diffForHumans()); ?></li>
                        <?php if($status->user->id !== auth()->user()->id  && auth()->user()->isFriendsWith($status->user)): ?>
                            <li class="list-inline-item"><a id="user_q" href="<?php echo e(route('status.like', $status)); ?>">Like</a></li>
                        <?php endif; ?>
                        <li class="list-inline-item"><?php echo e($status->likes->count()); ?> <?php echo e(Str::plural('like', $status->likes->count())); ?></li>
                    </ul>

                    <?php if($status->replies()->count()): ?>
                        <hr />
                        <?php $__currentLoopData = $status->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="media">
                                <a href="<?php echo e(route('profile.index', $reply->user)); ?>" class="float-left" id="user_q">
                                    <img class="mr-3" src="<?php echo e($reply->user->getAvatarUrl()); ?>" alt="<?php echo e($reply->user->first_name . ' ' . $reply->user->last_name); ?>" />
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0"><a id="user_q" href="<?php echo e(route('profile.index', $reply->user)); ?>"><?php echo e($reply->user->first_name); ?></a></h5>
                                    <p><?php echo e($reply->body); ?></p>
    
                                    <ul class="list-inline text-muted">
                                        <li class="list-inline-item"><?php echo e($reply->created_at->diffForHumans()); ?></li>
                                        <?php if($reply->user->id !== auth()->user()->id && auth()->user()->isFriendsWith($reply->user)): ?>
                                            <li class="list-inline-item"><a id="user_q" href="<?php echo e(route('status.like', $reply)); ?>">Like</a></li>
                                        <?php endif; ?>
                                        <li class="list-inline-item"><?php echo e($reply->likes->count()); ?> <?php echo e(Str::plural('like', $reply->likes->count())); ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if(auth()->user()->isFriendsWith($status->user)): ?>
                        <form action="<?php echo e(route('status.reply', $status->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <textarea name="reply-<?php echo e($status->id); ?>" id="reply-<?php echo e($status->id); ?>" rows="2" class="form-control <?php $__errorArgs = ["reply-$status->id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Reply to this status"></textarea>
                                <?php $__errorArgs = ["reply-$status->id"];
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
                            <input type="submit" value="Reply" class="btn btn-block btn-primary btn-sm" />
                        </form>
                    <?php elseif(auth()->user()->id === $status->user->id): ?>
                        <form action="<?php echo e(route('status.reply', $status->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <textarea name="reply-<?php echo e($status->id); ?>" id="reply-<?php echo e($status->id); ?>" rows="2" class="form-control <?php $__errorArgs = ["reply-$status->id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Reply to this status"></textarea>
                                <?php $__errorArgs = ["reply-$status->id"];
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
                            <input type="submit" value="Reply" class="btn btn-block btn-primary btn-sm" />
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo e($statuses->links()); ?><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/includes/user/_status.blade.php ENDPATH**/ ?>