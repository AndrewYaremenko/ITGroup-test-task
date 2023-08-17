<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        Genre::create(['name' => 'Action']);
        Genre::create(['name' => 'Drama']);
        Genre::create(['name' => 'Comedy']);
        Genre::create(['name' => 'Thriller']);
        Genre::create(['name' => 'Crime']);
        Genre::create(['name' => 'Romance']);
    }
}
