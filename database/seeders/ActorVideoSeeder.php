<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorVideoSeeder extends Seeder
{
    public function run()
    {
        $associations = [
            // Badlands
            ['video_id' => 1, 'actor_id' => 1], // Martin Sheen
            ['video_id' => 1, 'actor_id' => 2], // Sissy Spacek
            // Boys_Girls
            ['video_id' => 2, 'actor_id' => 3], // Ryan Gosling
            ['video_id' => 2, 'actor_id' => 4], // Margot Robbie
            // Christopher_Moltisanti
            ['video_id' => 3, 'actor_id' => 5], // Michael Imperioli
            // Comeback
            ['video_id' => 4, 'actor_id' => 6], // Sylvester Stallone
            // Deletin_Linkdln
            ['video_id' => 5, 'actor_id' => 7], // Ben Stiller
            // Fight_Club
            ['video_id' => 6, 'actor_id' => 8], // Edward Norton
            ['video_id' => 6, 'actor_id' => 9], // Brad Pitt
            // Florida_project
            ['video_id' => 7, 'actor_id' => 10], // Brooklynn Prince
            ['video_id' => 7, 'actor_id' => 11], // Willem Dafoe
            ['video_id' => 7, 'actor_id' => 12], // Bria Vinaite
            // Friend_No_replies
            ['video_id' => 8, 'actor_id' => 13], // John Travolta
            // Gap_Godland
            ['video_id' => 9, 'actor_id' => 14], // Elliott Crosset Hove
            // Just_be_yourself
            ['video_id' => 10, 'actor_id' => 3], // Ryan Gosling
            ['video_id' => 10, 'actor_id' => 15], // Christian Bale
            ['video_id' => 10, 'actor_id' => 16], // Matthew McConaughey
            ['video_id' => 10, 'actor_id' => 17], // Rami Malek
            ['video_id' => 10, 'actor_id' => 18], // Cillian Murphy
            ['video_id' => 10, 'actor_id' => 19], // Angelina Jolie
            ['video_id' => 10, 'actor_id' => 20], // Jeremy Strong
            ['video_id' => 10, 'actor_id' => 21], // Natalie Portman
            ['video_id' => 10, 'actor_id' => 22], // Robert De Niro
            ['video_id' => 10, 'actor_id' => 23], // James Gandolfini
            ['video_id' => 10, 'actor_id' => 24], // Rosamund Pike
            ['video_id' => 10, 'actor_id' => 25], // Jeremy Allen White
            ['video_id' => 10, 'actor_id' => 26], // Jake Gyllenhaal
            ['video_id' => 10, 'actor_id' => 27], // Al Pacino
            // Manchester_by_the_sea
            ['video_id' => 11, 'actor_id' => 28], // Casey Affleck
            // Maybe_im_goated
            ['video_id' => 12, 'actor_id' => 29], // Tony Leung Chiu-wai
            // Me_at_a_party
            ['video_id' => 13, 'actor_id' => 3], // Ryan Gosling
            // Shit_hurt_so_bad
            ['video_id' => 14, 'actor_id' => 18], // Cillian Murphy
            // Star_Wars_Her
            ['video_id' => 15, 'actor_id' => 30], // Hayden Christensen
            ['video_id' => 15, 'actor_id' => 21], // Natalie Portman
            // Stare
            ['video_id' => 16, 'actor_id' => 22], // Robert De Niro
            // The_art_ofICI_racing_in_the_rain
            ['video_id' => 17, 'actor_id' => 35], // Milo Ventimiglia
            // Trainspotting
            ['video_id' => 18, 'actor_id' => 31], // Ewan McGregor
            // True_Detective_Rust
            ['video_id' => 19, 'actor_id' => 16], // Matthew McConaughey
            ['video_id' => 19, 'actor_id' => 32], // Woody Harrelson
            // Worst_Arriving
            ['video_id' => 20, 'actor_id' => 9], // Brad Pitt
            // it_is_what_it_is
            ['video_id' => 21, 'actor_id' => 3], // Ryan Gosling
            // solitude
            ['video_id' => 22, 'actor_id' => 16], // Matthew McConaughey
            ['video_id' => 22, 'actor_id' => 5], // Michael Imperioli
            ['video_id' => 22, 'actor_id' => 33], // Robert Pattinson
            ['video_id' => 22, 'actor_id' => 3], // Ryan Gosling
            ['video_id' => 22, 'actor_id' => 25], // Jeremy Allen White
            ['video_id' => 22, 'actor_id' => 20], // Jeremy Strong
            // Anakin
            ['video_id' => 23, 'actor_id' => 30], // Hayden Christensen
            ['video_id' => 23, 'actor_id' => 31], // Ewan McGregor
            ['video_id' => 23, 'actor_id' => 21], // Natalie Portman
            // Scarface
            ['video_id' => 24, 'actor_id' => 27], // Al Pacino
            // Sound_of_metal
            ['video_id' => 25, 'actor_id' => 34], // Riz Ahmed
        ];

        foreach ($associations as $association) {
            $video = Video::find($association['video_id']);
            if ($video) {
                $video->actors()->attach($association['actor_id']);
            }
        }
    }
}