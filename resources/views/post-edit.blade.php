@extends('app')

@section('content')
    <h1>Halaman Update Data</h1>
    <form action="{{ route('posts.update', $id) }}" method="post">
        @csrf
        @method('PUT')
        {{-- asadsafsadfsdf --}}
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="create new nama" value="{{ $nama }}">
          </div>
          <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat" style="height: 100px" name="alamat">{{ $alamat }}</textarea>
          </div>
          <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tanggal_lahit" value="{{ $tanggal_lahir}}">
          </div>
          <div class="mb-3">
              <label for="nama_ruang" class="form-label">Nama Ruang</label>
              <select class="form-select" aria-label="Default select example" name="nama_ruang" id="nama_ruang">
                  <option selected>Open this select menu</option>
                  <option value="Ruang 1">Ruang 1</option>
                  <option value="Ruang 2">Ruang 2</option>
                  <option value="Ruang 3">Ruang 3</option>
                </select>
          </div>
          <div class="mb-3">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
    </form>
    <div class="mb-3">
        <a href="{{ url('/posts') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
