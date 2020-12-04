@extends('layouts.app')

@section('title')
    {{ $user->first_name . ' ' . $user->last_name }} - Profile | Connectify
@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            @include('includes.user._userblock')
            <hr />

            @if (!$statuses->count())
                <p class="text-muted">{{ $user->first_name }} hasn't posted anything yet!</p>
            @else
                @include('includes.user._status')
            @endif
        </div>
        
        <div class="col-md-4 offset-md-3">
            @auth
                @if (auth()->user() != $user)
                    @if (auth()->user()->hasFriendRequestPending($user))
                        <p>Waiting for {{ $user->first_name }} to accept your request.</p>
                    @elseif (auth()->user()->isFriendsWith($user))
                        <p>You and {{ $user->first_name }} are friends.</p>
                        <form action="{{ route('friend.remove', $user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remove Friend" class="btn btn-danger mb-3" />
                        </form>
                    @elseif (auth()->user()->hasFriendRequestRecieved($user))
                        <a href="{{ route('friend.accept', $user) }}" class="btn btn-primary mb-3">Accept request</a>
                    @else
                        <a href="{{ route('friend.add', $user) }}" class="btn btn-primary mb-3">Add as friend</a>
                    @endif
                @endif
            @endauth

            <h4 class="text-muted mb-4"><b>{{ $user->first_name }}</b>'s friends</h4>

            @if (!$user->friends()->count())
                <p>{{ $user->first_name }} has no friends!</p>
            @else
                @foreach ($user->friends() as $user)
                    <div class="mb-3">
                        @include('includes.user._userblock')
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
