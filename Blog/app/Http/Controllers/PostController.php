<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        $post['content'] = Str::markdown($post->content);
        ;
        return view('posts.show', ['post' => $post]);
    }

    public function delete(Post $post)
    {
        // Sprawdź, czy zalogowany użytkownik jest właścicielem postu
        if ($post->user_id != auth()->id()) {
            // Użytkownik nie jest właścicielem postu, zwróć błąd 403 (Brak uprawnień)
            abort(403, 'Unauthorized action. You do not have permission to delete this post.');
        }

        // Usuń post
        $post->delete();

        // Przekieruj z powiadomieniem o sukcesie
        return redirect()->route('dashboard.posts')->with('success', 'Post deleted successfully.');
    }

    public function edit(Post $post)
    {
        // Sprawdź, czy zalogowany użytkownik jest właścicielem postu
        if ($post->user_id != auth()->id()) {
            return redirect()->route('posts.show', $post)->with('error', 'Nie masz uprawnień do edycji tego postu.');
        }

        // Użytkownik jest właścicielem postu, więc możemy wyświetlić formularz edycji
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        // Sprawdź, czy zalogowany użytkownik jest właścicielem postu
        if ($post->user_id != auth()->id()) {
            // Użytkownik nie jest właścicielem postu, zwróć błąd 403 (Brak uprawnień)
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully.');
    }
}
