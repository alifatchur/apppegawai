@extends('app')

@section('content')
    <h2>{{ $isi_post }}</h2>
    <div><a href="{{ url('posts') }}" class="btn btn-primary">Kembali</a></div>
@endsection