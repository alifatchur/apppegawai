<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Storage::get("posts.txt");
        $posts = explode("\n", $posts);

        return view('posts', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // mengambil file storage
        $posts = Storage::get("posts.txt");
        $posts = explode("\n", $posts);

        // menangkap id terakhir
        $post = explode(',', $posts[count($posts)-1]);
        $id = $post[0];

        $nama = $request->nama;
        $alamat = $request->alamat;
        $tanggal_lahir = $request->tanggal_lahir;
        $nama_ruang = $request->nama_ruang;

        $post = [
            $id+1,
            $nama,
            $alamat,
            $tanggal_lahir,
            $nama_ruang,
        ];

        $post = implode(',', $post);
        array_push($posts, $post);
        $posts = implode("\n", $posts);

        Storage::write('posts.txt', $posts);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Storage::get("posts.txt");
        $posts = explode("\n", $posts);

        $post = explode(',', $posts[$id]);
        return view('post', [
            'isi_post' => $post[2],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Storage::get('posts.txt');
        $posts = explode("\n", $posts);

        $post = $posts[$id];
        $post = explode(',', $post);

        // dd($post);
        return view('post-edit',[
            'id'=>$post[0],
            'nama'=>$post[1],
            'alamat'=>$post[2],
            'tanggal_lahir'=>$post[3],
            'nama_ruang'=>$post[4],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // mengambil file storage
        $posts = Storage::get("posts.txt");
        $posts = explode("\n", $posts);

        // menangkap id terakhir
        $post = explode(',', $posts[$id]);

        $nama = $request->nama;
        $alamat = $request->alamat;
        $tanggal_lahir = $request->tanggal_lahir;
        $nama_ruang = $request->nama_ruang;

        $post = [
            $id+1,
            $nama,
            $alamat,
            $tanggal_lahir,
            $nama_ruang,
        ];

        $post = implode(',', $post);
        $posts[$id] = $post;

        $posts = implode("\n", $posts);

        Storage::write('posts.txt', $posts);

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Storage::get("posts.txt");
        $posts = explode("\n", $posts);

        unset($posts[$id]);

        $posts = implode("\n", $posts);

        Storage::write('posts.txt', $posts);

        return redirect('posts');
    }
}
