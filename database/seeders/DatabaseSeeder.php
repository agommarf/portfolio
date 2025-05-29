<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ActorSeeder::class,
            CategorySeeder::class,
            VideoSeeder::class,
            ActorVideoSeeder::class,
            CategoryVideoSeeder::class,
        ]);
    }
}