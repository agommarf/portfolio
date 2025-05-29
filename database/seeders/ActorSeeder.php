<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    public function run()
    {
        $actors = [
            'Martin Sheen', 'Sissy Spacek', 'Ryan Gosling', 'Margot Robbie', 'Michael Imperioli',
            'Sylvester Stallone', 'Ben Stiller', 'Edward Norton', 'Brad Pitt', 'Brooklynn Prince',
            'Willem Dafoe', 'Bria Vinaite', 'John Travolta', 'Elliott Crosset Hove', 'Christian Bale',
            'Matthew McConaughey', 'Rami Malek', 'Cillian Murphy', 'Angelina Jolie', 'Jeremy Strong',
            'Natalie Portman', 'Robert De Niro', 'James Gandolfini', 'Rosamund Pike', 'Jeremy Allen White',
            'Jake Gyllenhaal', 'Al Pacino', 'Casey Affleck', 'Tony Leung Chiu-wai', 'Hayden Christensen',
            'Ewan McGregor', 'Woody Harrelson', 'Robert Pattinson', 'Riz Ahmed', 'Milo Ventimiglia'
        ];

        foreach ($actors as $actor) {
            Actor::create(['name' => $actor]);
        }
    }
}
