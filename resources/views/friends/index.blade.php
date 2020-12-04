@extends('layouts.app')

@section('title', 'Your Friends & Requests | Connectify')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-muted mb-3">Your Friends</h3>

            @if (!$friends->count())
                <p>You have no friends!</p>
            @else
                @foreach ($friends as $user)
                    <div class="mb-3">
                        @include('includes.user._userblock')
                    </div>
                @endforeach
            @endif
        </div>

        <div class="col-md-6">
            <h4 class="text-muted mb-3">Friend Requests</h4>

            @if (!$requests->count())
                <p>You have no requests!</p>
            @else
                @foreach ($requests as $user)
                    <div class="mb-3">
                        @include('includes.user._userblock')
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection