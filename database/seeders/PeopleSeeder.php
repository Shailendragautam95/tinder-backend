<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\People;

class PeopleSeeder extends Seeder
{
    public function run(): void
    {
        $people = [
            [
                'name' => 'Aisha Sharma',
                'age' => 24,
                'location' => 'Delhi',
                'picture_url' => 'https://picsum.photos/200?random=1',
            ],
            [
                'name' => 'Rohan Verma',
                'age' => 27,
                'location' => 'Mumbai',
                'picture_url' => 'https://picsum.photos/200?random=2',
            ],
            [
                'name' => 'Priya Patel',
                'age' => 22,
                'location' => 'Ahmedabad',
                'picture_url' => 'https://picsum.photos/200?random=3',
            ],
            [
                'name' => 'Arjun Singh',
                'age' => 29,
                'location' => 'Bangalore',
                'picture_url' => 'https://picsum.photos/200?random=4',
            ],
            [
                'name' => 'Sneha Reddy',
                'age' => 26,
                'location' => 'Hyderabad',
                'picture_url' => 'https://picsum.photos/200?random=5',
            ],
        ];

        foreach ($people as $p) {
            People::create($p);
        }
    }
}
