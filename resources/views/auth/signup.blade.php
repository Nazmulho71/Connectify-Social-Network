@extends('layouts.app')

@section('title', 'Create An Account | Connectify')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6 m-auto">
            <h2 class="text-center mb-4"><b>Create An Account</b></h2>

            <div class="card shadow-sm">
                <div class="card-body mb-0">
                    <form action="{{ route('auth.signup') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="first_name" class="text-muted">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" autocomplete="off" autofocus />

                            @error('first_name')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="text-muted">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" autocomplete="off" autofocus />

                            @error('last_name')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="location" class="text-muted">Location</label>
                            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" autocomplete="off" autofocus />

                            @error('location')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="email" class="text-muted">Your Email Address</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off" autofocus />

                            @error('email')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="username" class="text-muted">Choose A Username</label>
                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" autocomplete="off" />

                            @error('username')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password" class="text-muted">Type A Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="" autocomplete="off" />

                            @error('password')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label for="password_confirmation" class="text-muted">Re-type Your Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="" autocomplete="off" />
                        </div>
                        
                        <input type="submit" class="btn btn-block btn-primary" value="Sign Up" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection