<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function userDestroy()
    {
        Auth::user()->delete();
        return redirect()->route('home');
    }

    
}
