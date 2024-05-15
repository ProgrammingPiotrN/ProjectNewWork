<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    public function profile_user(Request $request, User $user){

        return view('includes.dashboard.profile_user', [
            'user_photo' => $user->user_photo,
            'auth' => $user->username,
            'posts' => $user->posts()->latest()->paginate(6)
        ]);

    }

    public function manage()
    {
        return view('includes.dashboard.user_photo');
    }

    public function store_photo(Request $request)
    {
        $request->validate([
            'user_photo' => 'required|image|max:3000'
        ]);

        $user = auth()->user();

        $filename = $user->id . "-" . uniqid() . ".jpg";

        $managerImg = new ImageManager(new Driver());
        $img = $managerImg->read($request->file("user_photo"));
        $dataImg = $img->cover(120, 120)->toJpeg();
        Storage::put("public/user_photo/" . $filename, $dataImg);

        $user->user_photo = $filename;
        $user->save();

        return back()->with('success', 'Congrats on the new avatar.');

    }
}
