<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;

class IndexCategory extends Component
{
    public function render()
    {
        $categories=Category::all();
        $announcements=Announcement::where('is_accepted', true)->orderBy('updated_at', 'desc')->get();
        return view('livewire.index-category', compact('categories', 'announcements'));
    }
}
