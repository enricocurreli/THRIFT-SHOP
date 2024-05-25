<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;

class IndexHome extends Component
{
    public function render()
    {
        // $announcements = Announcement::all();

        // $announcements = DB::table('announcements')->max('updated_at');

        // $announcements = Announcement::select() -> orderByDesc('updated_at')->get();

        // $announcements = Announcement::orderBy('updated_at','desc')->take(4)->get();
        
        $announcements = Announcement::where('is_accepted', true)->get()->sortByDesc('updated_at')->take(4);

        $categories = Category::all();
        
        return view('livewire.index-home', compact('announcements', 'categories'));
    }
}
