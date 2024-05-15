<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Post::with('user');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('content', 'like', '%' . $searchTerm . '%');
            });
        }

        $posts = $query->whereNotNull('user_id') // Posty z przypisanym użytkownikiem
                       ->where('user_id', '!=', $user->id) // Posty innych użytkowników
                       ->orWhere('user_id', $user->id) // Posty zalogowanego użytkownika
                       ->latest()
                       ->paginate(6);

        return view('includes.dashboard.dashboard_posts', compact('posts'));
    }
}
