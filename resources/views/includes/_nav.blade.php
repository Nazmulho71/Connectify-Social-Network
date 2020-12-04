<nav class="navbar nav navbar-expand-lg navbar-dark text-light mb-4" style="background:#1f2029;">
    <div class="container">
        <a class="navbar-brand mr-3" href="/">
            <img src="{{ asset('favicon.png') }}" width="35" height="35" class="d-inline-block align-content-between" alt="Connectify-Logo" />
        </a>

        <button class="navbar-toggler btn btn-dark" style="border-color:transparent;" type="button" data-toggle="collapse" data-target="#navbarCollapsed" aria-controls="navbarCollapsed" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarCollapsed">
            <div class="navbar-nav mr-auto">
                @auth
                    <form action="{{ route('search.results') }}" methond="get" class="form-inline ml-2 mr-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-dark text-muted my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                            </div>

                            <input name="_q" class="form-control border-dark text-light bg-dark" placeholder="Find people..." autocomplete="off" aria-label="Search" value="{{ Request::input('_q') }}" />
                        </div>
                    </form>
                    
                    <ul class="navbar-nav nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Timeline</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('friends.index') }}">Friends</a>
                        </li>
                    </ul>
                @endauth
            </div>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.index', ['user' => auth()->user()]) }}">
                            {{ auth()->user()->first_name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit', ['user' => auth()->user()]) }}">Update Profile</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.signout') }}">Sign Out</a>
                    </li>
                @endauth
                
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.signin') }}">Sign In</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.signup') }}">Sign Up</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>