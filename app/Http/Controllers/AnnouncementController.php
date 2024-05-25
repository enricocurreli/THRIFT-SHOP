<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function create(){

        return view('announcement.create');
    }

    public function index(){

        $announcements = Announcement::where('is_accepted', true)->get()->sortByDesc('created_at');

        // Aggiungere ->paginate(10);
        
        return view('announcement.index', compact('announcements'));
    }

    public function show(Announcement $announcement){

        return view('announcement.show', compact('announcement'));
    }

    public function searchAnnouncements(Request $request) {
        $word = $request->searched;

        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->get();
        //  dd($announcements);
        // $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcement.search', compact('announcements', 'word'));        
    }
}


