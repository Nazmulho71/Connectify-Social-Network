<nav class="navbar nav navbar-expand-lg navbar-dark text-light mb-4" style="background:#1f2029;">
    <div class="container">
        <a class="navbar-brand mr-3" href="/">
            <img src="<?php echo e(asset('favicon.png')); ?>" width="35" height="35" class="d-inline-block align-content-between" alt="Connectify-Logo" />
        </a>

        <button class="navbar-toggler btn btn-dark" style="border-color:transparent;" type="button" data-toggle="collapse" data-target="#navbarCollapsed" aria-controls="navbarCollapsed" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarCollapsed">
            <div class="navbar-nav mr-auto">
                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('search.results')); ?>" methond="get" class="form-inline ml-2 mr-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-dark text-muted my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </div>

                            <input name="_q" class="form-control border-dark text-light bg-dark" placeholder="Find people..." autocomplete="off" aria-label="Search" value="<?php echo e(Request::input('_q')); ?>" />
                        </div>
                    </form>
                    
                    <ul class="navbar-nav nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('home')); ?>">Timeline</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('friends.index')); ?>">Friends</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <ul class="navbar-nav">
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('profile.index', ['user' => auth()->user()])); ?>">
                            <?php echo e(auth()->user()->first_name); ?>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('profile.edit', ['user' => auth()->user()])); ?>">Update Profile</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('auth.signout')); ?>">Sign Out</a>
                    </li>
                <?php endif; ?>
                
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('auth.signin')); ?>">Sign In</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('auth.signup')); ?>">Sign Up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\codecourse\laravel\connectify\resources\views/includes/_nav.blade.php ENDPATH**/ ?>