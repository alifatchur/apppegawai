@extends('app')

@section('content')
    <h1>Halaman Update Data</h1>
    <form action="{{ route('posts.update', $id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ $judul }}" placeholder="create new judul">
        </div>
        <div class="mb-3">
            <label for="isi_post" class="form-label">Isi</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="isi_post" style="height: 100px" name="isi_post">{{ $isi_post }}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div class="mb-3">
        <a href="{{ url('/posts') }}" class="btn btn-primary">Kembali</a>
    </div>    
@endsection