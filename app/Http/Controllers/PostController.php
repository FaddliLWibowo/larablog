<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store()
    {
        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'category_id' => request('category_id'),
            'slug' => str_slug(request('title'))
        ]);

        return redirect()->route('post.index')->withSuccess('Data berhasil ditambahkan');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'category_id' => request('category_id'),
            'slug' => str_slug(request('title'))
        ]);

        return redirect()->route('post.index')->withInfo('Data berhasil dirubah');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->withDanger('Data berhasil dihapus');
    }

}
