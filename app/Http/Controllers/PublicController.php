<?php

namespace App\Http\Controllers;

use App\Mail\Newsletter;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    function home()
    {

        $announcements = Announcement::where('is_accepted', true)->take(4)->get()->sortByDesc('created_at');

        return view('welcome', compact('announcements'));
    }

    public function submitNewsletter(Request $request)
    {
        $email = $request->input('email');

        Mail::to($email)->send(new Newsletter($email));

        return redirect()->back()->with('message', "Grazie per esserti iscritto alla Newsletter!");
        
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
}
}