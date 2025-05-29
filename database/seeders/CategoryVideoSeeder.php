<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryVideoSeeder extends Seeder
{
    public function run()
    {
        $associations = [
            // Badlands
            ['video_id' => 1, 'category_id' => 1], // Badlands (movie)
            // Boys_Girls
            ['video_id' => 2, 'category_id' => 2], // I Tonya (movie)
            ['video_id' => 2, 'category_id' => 3], // Blue valentine (movie)
            ['video_id' => 2, 'category_id' => 4], // La La Land (movie)
            ['video_id' => 2, 'category_id' => 5], // Crazy, Stupid, Love (movie)
            ['video_id' => 2, 'category_id' => 6], // Song to Song (movie)
            // Christopher_Moltisanti
            ['video_id' => 3, 'category_id' => 7], // The Sopranos (series)
            // Comeback
            ['video_id' => 4, 'category_id' => 8], // Rocky (movie)
            // Deletin_Linkdln
            ['video_id' => 5, 'category_id' => 9], // The Secret Life of Walter Mitty (movie)
            // Fight_Club
            ['video_id' => 6, 'category_id' => 10], // Fight Club (movie)
            // Florida_project
            ['video_id' => 7, 'category_id' => 11], // The Florida Project (movie)
            // Friend_No_replies
            ['video_id' => 8, 'category_id' => 12], // Saturday Night Fever (movie)
            // Gap_Godland
            ['video_id' => 9, 'category_id' => 13], // Godland (movie)
            // Just_be_yourself
            ['video_id' => 10, 'category_id' => 14], // Drive (movie)
            ['video_id' => 10, 'category_id' => 15], // American psycho (movie)
            ['video_id' => 10, 'category_id' => 16], // True Detective (series)
            ['video_id' => 10, 'category_id' => 17], // Mr Robot (series)
            ['video_id' => 10, 'category_id' => 18], // Peaky blinders (series)
            ['video_id' => 10, 'category_id' => 19], // Girl interrupted (movie)
            ['video_id' => 10, 'category_id' => 20], // Succession (series)
            ['video_id' => 10, 'category_id' => 21], // Black Swan (movie)
            ['video_id' => 10, 'category_id' => 22], // Taxi Driver (movie)
            ['video_id' => 10, 'category_id' => 10], // Fight Club (movie)
            ['video_id' => 10, 'category_id' => 7], // The Sopranos (series)
            ['video_id' => 10, 'category_id' => 23], // Gone Girl (movie)
            ['video_id' => 10, 'category_id' => 24], // The bear (series)
            ['video_id' => 10, 'category_id' => 25], // Nightcrawler (movie)
            ['video_id' => 10, 'category_id' => 26], // Scarface (movie)
            // Manchester_by_the_sea
            ['video_id' => 11, 'category_id' => 27], // Manchester by the sea (movie)
            // Maybe_im_goated
            ['video_id' => 12, 'category_id' => 28], // Happy Together (movie)
            // Me_at_a_party
            ['video_id' => 13, 'category_id' => 6], // Song to Song (movie)
            // Shit_hurt_so_bad
            ['video_id' => 14, 'category_id' => 29], // 28 days later (movie)
            // Star_Wars_Her
            ['video_id' => 15, 'category_id' => 30], // Star wars: Attack of the Clones (movie)
            // Stare
            ['video_id' => 16, 'category_id' => 22], // Taxi Driver (movie)
            // The_art_of_racing_in_the_rain
            ['video_id' => 17, 'category_id' => 31], // The Art of Racing in the Rain (movie)
            // Trainspotting
            ['video_id' => 18, 'category_id' => 32], // Trainspotting (movie)
            // True_Detective_Rust
            ['video_id' => 19, 'category_id' => 16], // True Detective (series)
            // Worst_Arriving
            ['video_id' => 20, 'category_id' => 33], // Seven (movie)
            ['video_id' => 20, 'category_id' => 34], // Once Upon a time in Hollywood (movie)
            // it_is_what_it_is
            ['video_id' => 21, 'category_id' => 35], // Blade runner 2049 (movie)
            // solitude
            ['video_id' => 22, 'category_id' => 16], // True Detective (series)
            ['video_id' => 22, 'category_id' => 7], // The Sopranos (series)
            ['video_id' => 22, 'category_id' => 36], // The Lighthouse (movie)
            ['video_id' => 22, 'category_id' => 35], // Blade Runner 2049 (movie)
            ['video_id' => 22, 'category_id' => 24], // The bear (series)
            ['video_id' => 22, 'category_id' => 20], // Succession (series)
            // Anakin
            ['video_id' => 23, 'category_id' => 37], // Star Wars: Revenge of the sith (movie)
            // Scarface
            ['video_id' => 24, 'category_id' => 26], // Scarface (movie)
            // Sound_of_metal
            ['video_id' => 25, 'category_id' => 38], // Sound of metal (movie)
        ];

        foreach ($associations as $association) {
            $video = Video::find($association['video_id']);
            if ($video) {
                $video->categories()->attach($association['category_id']);
            }
        }
    }
}