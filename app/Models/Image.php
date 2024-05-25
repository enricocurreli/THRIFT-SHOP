<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'cropped_path',
        'announcement_id'
    ];

    public function announcement()
    {

        return $this->belongsTo(Announcement::class);
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if (!$w && !$h) { //se non specifico nessuna dimensione mi ritorna il percorso dell'immagine originale
            return Storage::url($filePath);
        }

        $path = dirname($filePath);
        $fileName = basename($filePath);
        $file = "{$path}/crop_{$w}x{$h}_{$fileName}"; //ritorna il percorso della cartella che contiene le immagini croppate

        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null)
    {
        return Image::getUrlByFilePath($this->path, $w, $h);
    }

    protected function casts(): array
    {
        return [
            'labels' => 'array',
        ];
    }
}
