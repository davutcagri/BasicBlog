@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">@include('posts.create')</div>
        <div class="col-6">
            @if(isset($posts) && count($posts) > 0)
                @include('posts.show', ['$posts' => 'posts'])
            @else
                <p>No post available.</p>
            @endif
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection
