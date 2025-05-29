<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Badlands', 'type' => 'movie'],
            ['name' => 'I Tonya', 'type' => 'movie'],
            ['name' => 'Blue valentine', 'type' => 'movie'],
            ['name' => 'La La Land', 'type' => 'movie'],
            ['name' => 'Crazy, Stupid, Love', 'type' => 'movie'],
            ['name' => 'Song to Song', 'type' => 'movie'],
            ['name' => 'The Sopranos', 'type' => 'series'],
            ['name' => 'Rocky', 'type' => 'movie'],
            ['name' => 'The Secret Life of Walter Mitty', 'type' => 'movie'],
            ['name' => 'Fight Club', 'type' => 'movie'],
            ['name' => 'The Florida Project', 'type' => 'movie'],
            ['name' => 'Saturday Night Fever', 'type' => 'movie'],
            ['name' => 'Godland', 'type' => 'movie'],
            ['name' => 'Drive', 'type' => 'movie'],
            ['name' => 'American psycho', 'type' => 'movie'],
            ['name' => 'True Detective', 'type' => 'series'],
            ['name' => 'Mr Robot', 'type' => 'series'],
            ['name' => 'Peaky blinders', 'type' => 'series'],
            ['name' => 'Girl interrupted', 'type' => 'movie'],
            ['name' => 'Succession', 'type' => 'series'],
            ['name' => 'Black Swan', 'type' => 'movie'],
            ['name' => 'Taxi Driver', 'type' => 'movie'],
            ['name' => 'Gone Girl', 'type' => 'movie'],
            ['name' => 'The bear', 'type' => 'series'],
            ['name' => 'Nightcrawler', 'type' => 'movie'],
            ['name' => 'Scarface', 'type' => 'movie'],
            ['name' => 'Manchester by the sea', 'type' => 'movie'],
            ['name' => 'Happy Together', 'type' => 'movie'],
            ['name' => '28 days later', 'type' => 'movie'],
            ['name' => 'Star wars: Attack of the Clones', 'type' => 'movie'],
            ['name' => 'The Art of Racing in the Rain', 'type' => 'movie'],
            ['name' => 'Trainspotting', 'type' => 'movie'],
            ['name' => 'Seven', 'type' => 'movie'],
            ['name' => 'Once Upon a time in Hollywood', 'type' => 'movie'],
            ['name' => 'Blade runner 2049', 'type' => 'movie'],
            ['name' => 'The Lighthouse', 'type' => 'movie'],
            ['name' => 'Star Wars: Revenge of the sith', 'type' => 'movie'],
            ['name' => 'Sound of metal', 'type' => 'movie'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
