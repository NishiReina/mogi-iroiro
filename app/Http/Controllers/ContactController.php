<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\User;

class ContactController extends Controller
{
    public function mailView(){
        return view('mail');
    }

    public function sendMail(Request $request)
    {
        $title = $request->title;
        $content = $request->content; 
        $users = User::all();
        
        foreach($users as $user){
            Mail::to($user->email)->send(new ContactMail($title, $content));
        }

        return view('thanks');
    }
}
