<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos = [
            ['title' => 'Video 1', 'file_path' => 'videos/video1.mp4', 'is_edit' => true, 'is_meme' => false],
            ['title' => 'Video 2', 'file_path' => 'videos/video2.mp4', 'is_edit' => false, 'is_meme' => true],
            ['title' => 'Video 3', 'file_path' => 'videos/video3.mp4', 'is_edit' => true, 'is_meme' => false],
            // Agrega aquí más videos hasta llegar a los 20
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
