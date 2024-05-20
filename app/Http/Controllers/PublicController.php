<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateUserRequest;

class PublicController extends Controller
{
    public function home()
    {
        $announcements = Announcement::with('category')->orderBy('created_at', 'desc')->get();
        return view('home' , compact('announcements'));
    }

    public function userDestroy()
    {
        Auth::user()->delete();
        return redirect()->route('home');
    }



}
