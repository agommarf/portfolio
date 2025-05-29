<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $videos = [
            [
                'title' => 'Badlands',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566304?h=2adc432196&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Boys_Girls',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566346?h=cd7a39c240&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Christopher_Moltisanti',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566372?h=8b70a22d90&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Comeback',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566408?h=8f96497203&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Deletin_Linkdln',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566979?h=02e20c6ba3&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Fight_Club',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566471?h=11205cd592&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Florida_project',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566513?h=36099ecf79&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Friend_No_replies',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566458?h=3a4ed5c481&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Gap_Godland',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566493?h=80bdacb459&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Just_be_yourself',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567654?h=d741247188&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Manchester_by_the_sea',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567559?h=b7a5a14340&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Maybe_im_goated',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566691?h=fab5bbf248&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Me_at_a_party',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567318?h=c407c8888f&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Shit_hurt_so_bad',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567745?h=5d59e2947e&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Star_Wars_Her',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567509?h=1fe6fdc18d&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Stare',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084568025?h=457daed92c&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'The_art_of_racing_in_the_rain',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567233?h=0bcdf71ed4&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Trainspotting',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567064?h=9be2d431cf&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'True_Detective_Rust',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566575?h=da6717733a&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Worst_Arriving',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084567842?h=4f384d0658&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'it_is_what_it_is',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566535?h=d16748bf5d&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'solitude',
                'type' => 'meme',
                'vimeo_url' => 'https://player.vimeo.com/video/1084566605?h=49071f2c5a&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Anakin',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1085429280?h=d86ef8d784&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Scarface',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1085429509?h=4e637e3753&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
            [
                'title' => 'Sound_of_metal',
                'type' => 'edit',
                'vimeo_url' => 'https://player.vimeo.com/video/1085429581?h=66c5c5fb08&title=0&byline=0&portrait=0&badge=0&autopause=0&player_id=0&app_id=58479'
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
