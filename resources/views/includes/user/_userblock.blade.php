<div class="media">
    <a href="{{ route('profile.index', ['user' => $user]) }}" class="float-left">
        <img src="{{ $user->getAvatarUrl() }}" alt="{{ $user->first_name . ' ' . $user->last_name }}" class="mr-3">
    </a>
    
    <div class="media-body">
        <h5 class="mt-0 mb-1">
            <a id="user_q" href="{{ route('profile.index', ['user' => $user]) }}">{{ $user->first_name . ' ' . $user->last_name }}</a>
        </h5>

        <p class="mb-0">{{ $user->location }}</p>
    </div>
</div>