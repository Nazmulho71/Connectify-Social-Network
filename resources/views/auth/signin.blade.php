@extends('layouts.app')

@section('title', 'Log In To Your Account | Connectify')

@section('content')
    <div class="row">
        <div class="col-md-5 m-auto">
            <h2 class="text-center mb-4"><b>Sign In</b></h2>

            <div class="card shadow-sm">
                <div class="card-body mb-0">
                    <form action="{{ route('auth.signin') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="username" class="text-muted">Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" autocomplete="off" autofocus />

                            @error('username')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password" class="text-muted">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="" autocomplete="off" />

                            @error('password')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" />
                            <label for="remember" class="custom-control-label">Remember Me</label>
                        </div>
                        
                        <input type="submit" class="btn btn-block btn-primary" value="Sign In" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection