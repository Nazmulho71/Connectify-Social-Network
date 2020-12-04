@extends('layouts.app')

@section('title', '404 - Page Not Found | Connectify')

@section('content')
    <h3>Oops, It's Missing! (404)</h3>
    <p class="text-muted"><a id="user_q" href="{{ route('home') }}">Go home</a></p>
@endsection