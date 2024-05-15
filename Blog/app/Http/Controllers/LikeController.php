<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);

        $existingLike = Like::where('post_id', $request->post_id)
                            ->where('user_id', auth()->id()) // Assuming authenticated user
                            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return back()->with('success', 'Post unliked successfully.');
        } else {
            $like = new Like();
            $like->post_id = $request->post_id;
            $like->user_id = auth()->id(); // Assuming authenticated user
            $like->save();

            return back()->with('success', 'Post liked successfully.');
        }
    }
}
