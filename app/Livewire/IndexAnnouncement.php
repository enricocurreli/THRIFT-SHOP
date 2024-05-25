<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class IndexAnnouncement extends Component
{   
    public function render()
    {
        
        $announcements = Announcement::where('is_accepted', true)->get()->sortByDesc('created_at');
        
        return view('livewire.index-announcement', compact('announcements'));
    }
}
