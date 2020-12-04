@extends('layouts.app')

@section('title', 'Search Results | Connectify')

@section('content')
    @if ($users->count())
        <h4 class="mb-4"><b>{{ $users->count() }}</b> {{ Str::plural('result', $users->count()) }} found for <b>{{ $q }}</b></h4>

        <div class="row">
            <div class="col-md-12">
                @foreach ($users as $user)
                    <div class="mb-3">
                        @include('includes.user._userblock')
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <h4 class="mb-3">Sorry, no results found!</h4>
    @endif
@endsection