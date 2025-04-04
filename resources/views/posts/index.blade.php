@extends('layouts.user')

@section('title','articles dashboard page | application')

@section('content')

<div class="d-flex justify-content-between align-items-center p-3 bg-light border rounded">
    <!-- Heading -->
    <div>
        <h3 class="mb-0 text-primary">Articles</h3>
    </div>

    <!-- Button -->
    <div>
        <a href="{{ route('posts.create') }}" class="btn btn-teal w3-button w3-round-large">Create Post</a>
    </div>

</div>


@endsection
