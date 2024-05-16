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

    // Usunięcie znaczników HTML
    $content = strip_tags($request->content);

    // Kodowanie znaków specjalnych HTML
    $content = htmlspecialchars($content);

    // Zapisanie komentarza
    $comment = new Comment();
    $comment->post_id = $request->post_id;
    $comment->user_id = auth()->id(); // Założenie, że użytkownik jest zalogowany
    $comment->content = $content;
    $comment->save();

    return back()->with('success', 'Comment added successfully!');
}
}
