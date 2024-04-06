@extends('app')

@section('content')
    <!-- Cover view -->
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
        </div>
    </div>
    <!-- Posts view -->
    <div class="row mb-2">
        <div class="col-md-3">
            <a href="{{ route('posts.create') }}" class="btn btn-success">+ Tambah Data</a>
        </div>
    </div>
    <div class="row mb-2">
        @foreach($posts as $post)
        @php($post = explode(',', $post))
        <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">{{ $post[1] }}</h3>
            <div class="mb-1 text-muted">{{ $post[3] }}</div>
            <p class="card-text mb-auto">{{ $post[2] }}</p>
            <a href="{{ route('posts.show', $post[0]) }}">Continue reading</a>
            <a href="{{ route('posts.edit', $post[0]) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post[0]) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-outline-danger">
            </form>
            </div>
            <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
        </div>
        </div>
        @endforeach
    </div>
@endsection