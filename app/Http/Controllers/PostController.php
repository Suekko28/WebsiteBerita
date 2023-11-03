<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Route;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        
        return view('posts.index', compact('posts'));
    }
    
    public function show()
    {

    }

    public function create ()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'kategori' => 'required',
            'thumbnail' => 'required|string|min:5|max:200'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'content' => $request->content,
            'kategori' => $request->kategori,
            'thumbnail' => $request->thumbnail

        ]);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10',
            'thumbnail' => 'required|string|min:5|max:200'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Post $post)
    {
        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function all(Post $post, $kategori) {
        $posts = Post::whereKategori($kategori)->latest()->simplepaginate(6);
        return view('posts.all', compact('posts', 'kategori'));
    }

    public function politic(Post $post, $kategori) {
        $posts = Post::whereKategori($kategori)->latest()->simplepaginate(6);
        return view('posts.politic', compact('posts', 'kategori'));
    }

    public function sport(Post $post, $kategori) {
        $posts = Post::whereKategori($kategori)->latest()->simplepaginate(6);
        return view('posts.sport', compact('posts', 'kategori'));
    }

    public function travel(Post $post, $kategori) {
        $posts = Post::whereKategori($kategori)->latest()->simplepaginate(6);
        return view('posts.travel', compact('posts', 'kategori'));
    }

    public function style(Post $post, $kategori) {
        $posts = Post::whereKategori($kategori)->latest()->simplepaginate(6);
        return view('posts.style', compact('posts', 'kategori'));
    }

    public function hotnews(Post $post, $kategori) {
        $posts = Post::whereKategori($kategori)->latest()->simplepaginate(6);
        return view('posts.hotnews', compact('posts', 'kategori'));
    }

    public function search(Request $request){
        
        $search=$request->search;
        $posts=DB::table('posts')
        ->where('title','like','%'.$search.'%')
        ->limit(10)
        ->get();
        
        if($posts->count()==0){
            return view('search',['kosong'=>True]);
        }
    return view('search', compact('posts','search'),['kosong'=>False]);   
}

    public function berita($id){
        $data = DB::table('posts')
        ->where('id', '=', $id)
        ->get();

        $latest = DB::table('posts')
        ->latest('id')
        ->paginate(3);

        $kategori = DB::table('posts')
        ->latest('id')
        ->paginate(3);
    
        return view('posts.berita', compact('data', 'latest', 'kategori'));
    }

}