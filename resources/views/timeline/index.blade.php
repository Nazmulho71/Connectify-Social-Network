@extends('layouts.app')

@section('title', 'Timeline - Connectify')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('status.post') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control @error('status') is-invalid @enderror" name="status" id="status" rows="5" placeholder="What's up {{auth()->user()->first_name}}?">{{ old('status') }}</textarea>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Post Status" />
                    </form>
                </div>
            </div>
            <hr class="mb-5" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @if (!$statuses->count())
                <p class="text-muted">There's nothing in your timeline yet!</p>
            @else
                @include('includes.user._status')
            @endif
        </div>
    </div>
@endsection
