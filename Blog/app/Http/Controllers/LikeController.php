<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $existingLike = Like::where('user_id', auth()->id())
                   ->where('post_id', $request->post_id)
                   ->first();

        if (!$existingLike) {
            $like = new Like();
            $like->user_id = auth()->id();
            $like->post_id = $request->post_id;
            $like->save();

            $post = Post::findOrFail($request->post_id);
            $post->likes_count += 1;
            $post->save();

            return back()->with('success', 'Post liked successfully!');
        } else {
            return back()->with('error', 'You have already liked this post!');
        }
    }

    public function unlike(Request $request)
    {
        // Sprawdź, czy użytkownik jest zalogowany
        if (auth()->check()) {
            // Znajdź polubienie użytkownika dla danego posta
            $like = Like::where('user_id', auth()->id())
                        ->where('post_id', $request->post_id)
                        ->first();

            // Sprawdź, czy polubienie istnieje
            if ($like) {
                // Usuń polubienie
                $like->delete();

                // Zmniejsz liczbę polubień dla posta
                $post = Post::findOrFail($request->post_id);
                $post->decrement('likes_count'); // Zmniejszanie wartości kolumny o 1
                // $post->likes_count -= 1; // Innego sposobu również możesz użyć
                $post->save();

                return back()->with('success', 'Post unliked successfully!');
            } else {
                return back()->with('error', 'You have not liked this post!');
            }
        } else {
            return back()->with('error', 'You are not logged in!');
        }
    }
}
