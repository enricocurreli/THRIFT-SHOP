<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::Create([
            'title' => 'Nike Air Force',
            'subtitle' => 'Nike',
            'body' => 'Queste scarpe, taglia 42 EU (9 US), sono di colore bianco con dettagli neri. Acquistate nel 2022, sono state indossate con cura e sono in ottimo stato. Le Nike Air Force 1 sono famose per la loro comodità e resistenza, grazie alla suola in gomma robusta e all\'ammortizzazione Air-Sole.',
            'user_id' => 1,
            'price' => 60,
            'category_id' => 5,
            'is_accepted' => true
        ]);
    }
}
