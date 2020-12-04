@extends('layouts.app')

@section('title')
    {{ $user->first_name . ' ' . $user->last_name }} - Edit Profile | Connectify
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 m-auto">
            <h2 class="text-center mb-4"><b>Edit Profile Info</b></h2>

            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('profile.edit', $user) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="first_name" class="text-muted">First Name</label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" autocomplete="off" value="{{ old('first_name') ?: $user->first_name }}" />

                            @error('first_name')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="text-muted">Last Name</label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" autocomplete="off" value="{{ old('last_name') ?: $user->last_name }}" />
                            
                            @error('last_name')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="location" class="text-muted">Location</label>
                            <input class="form-control @error('location') is-invalid @enderror" type="text" name="location" id="location" autocomplete="off" value="{{ old('location') ?: $user->location }}" />
                            
                            @error('location')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <input type="submit" value="Update Profile" class="btn btn-block btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection