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
            'content' => 'required',
        ]);

        $request['content'] = strip_tags($request['content']);


        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = auth()->id(); // assuming user is logged in
        $comment->content = strip_tags($request->content); // Remove HTML tags
        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }
}
