@foreach ($statuses as $status)
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="media">
                <a href="{{ route('profile.index', $status->user) }}" class="float-left" id="user_q">
                    <img class="mr-3" src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->first_name . ' ' . $status->user->last_name }}" />
                </a>
                <div class="media-body">
                    <h5 class="mt-0"><a id="user_q" href="{{ route('profile.index', $status->user) }}">{{ $status->user->first_name }}</a></h5>
                    <p>{{ $status->body }}</p>

                    <ul class="text-muted list-inline">
                        <li class="list-inline-item">{{ $status->created_at->diffForHumans() }}</li>
                        @if ($status->user->id !== auth()->user()->id  && auth()->user()->isFriendsWith($status->user))
                            <li class="list-inline-item"><a id="user_q" href="{{ route('status.like', $status) }}">Like</a></li>
                        @endif
                        <li class="list-inline-item">{{ $status->likes->count() }} {{ Str::plural('like', $status->likes->count()) }}</li>
                    </ul>

                    @if ($status->replies()->count())
                        <hr />
                        @foreach ($status->replies as $reply)
                            <div class="media">
                                <a href="{{ route('profile.index', $reply->user) }}" class="float-left" id="user_q">
                                    <img class="mr-3" src="{{ $reply->user->getAvatarUrl() }}" alt="{{ $reply->user->first_name . ' ' . $reply->user->last_name }}" />
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0"><a id="user_q" href="{{ route('profile.index', $reply->user) }}">{{ $reply->user->first_name }}</a></h5>
                                    <p>{{ $reply->body }}</p>
    
                                    <ul class="list-inline text-muted">
                                        <li class="list-inline-item">{{ $reply->created_at->diffForHumans() }}</li>
                                        @if ($reply->user->id !== auth()->user()->id && auth()->user()->isFriendsWith($reply->user))
                                            <li class="list-inline-item"><a id="user_q" href="{{ route('status.like', $reply) }}">Like</a></li>
                                        @endif
                                        <li class="list-inline-item">{{ $reply->likes->count() }} {{ Str::plural('like', $reply->likes->count()) }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if (auth()->user()->isFriendsWith($status->user))
                        <form action="{{ route('status.reply', $status->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="reply-{{ $status->id }}" id="reply-{{ $status->id }}" rows="2" class="form-control @error("reply-$status->id") is-invalid @enderror" placeholder="Reply to this status"></textarea>
                                @error("reply-$status->id")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="submit" value="Reply" class="btn btn-block btn-primary btn-sm" />
                        </form>
                    @elseif (auth()->user()->id === $status->user->id)
                        <form action="{{ route('status.reply', $status->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="reply-{{ $status->id }}" id="reply-{{ $status->id }}" rows="2" class="form-control @error("reply-$status->id") is-invalid @enderror" placeholder="Reply to this status"></textarea>
                                @error("reply-$status->id")
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="submit" value="Reply" class="btn btn-block btn-primary btn-sm" />
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach

{{ $statuses->links() }}