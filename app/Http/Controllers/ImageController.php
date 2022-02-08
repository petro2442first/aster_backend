<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function savePhoto(Request $request)
    {
        // dd($request->file('avatar'));
        Storage::putFileAs(
            'public', $request->file('avatar'), $request->file('avatar')->getClientOriginalName()
        );
        $user = Auth::user();
        $user->avatar = $request->file('avatar')->getClientOriginalName();
        $user->saveOrFail();
        return redirect()->route('profile');
    }
}
