<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function accept(Announcement $announcement){
        $announcement->setAccepted(true);
        $announcement->setUpdated();
        return redirect()->back()->with('message', "L'annuncio $announcement->title è stato accettato");
    }

    public function reject(Announcement $announcement){
        $announcement->setAccepted(false);
        $announcement->setUpdated();
        return redirect()->back()->with('error', "L'annuncio $announcement->title è stato rifiutato");
    }

    public function reset(){
        $announcement = Announcement::where('is_accepted', true)->orWhere('is_accepted', false)->orderBy('updated_at', 'desc')->first();        
        $announcement->setAccepted(null);
        return redirect()->back()->with('message', "L'annuncio $announcement->title è stato resettato");
    }
    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message', 'Hai fatto richiesta come revisore');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->route('home')->with('message', "Hai accettato $user->name come revisore");
    }
}
