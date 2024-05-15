<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->user_id = auth()->id(); // Assuming authenticated user
        $comment->save();

        return back()->with('success', 'Comment added successfully.');
    }
}
