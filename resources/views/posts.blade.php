@extends('app')

@section('content')
    <!-- Posts view -->
    <div class="row mb-2">
        <table class="table table-striped-columns">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Nama Ruang</th>
                <th>Action</th>
            </tr>

        @php
          $no =1;
        @endphp
        @foreach($posts as $post)
        @php($post = explode(',', $post))
            <tr>
                <td>{{$no++;}}</td>
                <td>{{ $post[1] }}</td>
                <td>{{ $post[2] }}</td>
                <td>{{ $post[3] }}</td>
                <td>{{ $post[4] }}</td>
                <td>
                    <a class="btn btn-sm btn-success" href="{{ route('posts.edit', $post[0]) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post[0]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                    </form>
                </td>

            </tr>
        @endforeach
        </table>
    </div>

    {{-- Form tambah data --}}
    <div class="mt-3">
        <h2>Tambah Data</h2>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="create new nama">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" style="height: 100px" name="alamat"></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahit">
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
    </div>
@endsection
