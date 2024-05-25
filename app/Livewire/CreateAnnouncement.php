<?php

namespace App\Livewire;

use App\Jobs\RemoveFaces;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    #[Validate('min:5', message: 'Il testo deve contenere almeno 5 caratteri')]
    #[Validate('required', message: 'Il campo è obbligatorio.')]
    public $title;

    #[Validate('min:5', message: 'Il testo deve contenere almeno 5 caratteri')]
    #[Validate('required', message: 'Il campo è obbligatorio.')]
    public $subtitle;

    #[Validate('min:5', message: 'Il testo deve contenere almeno 5 caratteri')]
    #[Validate('required', message: 'Il campo è obbligatorio.')]
    public $body;

    #[Validate('required', message: 'Il campo è obbligatorio.')]
    public $price;

    #[Validate('required', message: 'Il campo è obbligatorio.')]
    public $category;

    #[Validate('max:6000', message: 'Non entraaa!')]

    // #[Validate('image', message:'Deve essere un\'immagine!')]
    public $images = [];

    // #[Validate('max:6000', message:'Non entraaa!')]
    #[Validate(['temporary_images.*' => ['image', 'max:5000']], message: ['temporary_images.*.max' => 'Una delle immagini caricate supera i 5MB', 'temporary_images.*' => 'Uno dei file caricati non è un immagine'])]
    public $temporary_images = [];

    public $img;

    public function updatedTemporaryImages()
    {
        if ($this->validateOnly('temporary_images.*')) {
            
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }                        
        }
    }

    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {

        $this->validate();

        if ($this->category == 'NULL') {
            session()->flash('message', 'Scegli categoria');
        } else {
            // dd($this->category);

            $announcement = Announcement::create([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'body' => $this->body,
                'price' => $this->price,
                'category_id' => $this->category,
                'user_id' => Auth::user()->id,
            ]);

            if (count($this->images)) {
                foreach ($this->images as $image) {
                    $newFileName = "announcements/{$announcement->id}";
                    $newImage = $announcement->images()->create([
                        'path' => $image->store($newFileName, 'public')
                    ]);



                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path, 300, 300),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id)
                    ])->dispatch($newImage->id);



                    // $newImagePath = $newImage->path;
                    // ResizeImage::dispatch($newImagePath, 300, 300);
                    // GoogleVisionSafeSearch::dispatch($newImage->id);
                    // GoogleVisionLabelImage::dispatch($newImage->id);
                }
                File::deleteDirectory(storage_path('app/livewire-tmp')); 
            }

            $this->reset();

            session()->flash('message', __('form.announcementCreated'));
        }
    }


    public function render()
    {
        $categories = Category::all();

        return view('livewire.create-announcement', compact('categories'));
    }
}
