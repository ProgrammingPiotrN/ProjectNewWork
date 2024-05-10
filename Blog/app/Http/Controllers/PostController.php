<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post['title'] = strip_tags($post['title']);
        $post['content'] = strip_tags($post['content']);
        $post['user_id'] = auth()->id();

        $post = Post::create($post);


        return redirect("/posts/{$post->id}")->with('success', 'New post successfully created.');
    }

    public function show(Post $post)
    {
        $post['content'] = Str::markdown($post->content);;
        return view('posts.show', ['post' => $post]);
    }

}
