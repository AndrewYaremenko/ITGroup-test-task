<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(MovieSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(MovieGenreSeeder::class);
    }
}
