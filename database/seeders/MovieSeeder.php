<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{

    protected $priority = 30;

    public function run(): void
    {
        Movie::create([
            'title' => 'Drive',
            'poster_link' => 'https://m.media-amazon.com/images/I/91vya3UmldL._AC_UF894,1000_QL80_.jpg',
        ]);

        Movie::create([
            'title' => 'Place between pines',
            'poster_link' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/4323b99186953.560c9f9996830.jpg',
        ]);

        Movie::create([
            'title' => 'La La Land',
            'poster_link' => 'https://m.media-amazon.com/images/I/91jrKX9xjQL.jpg',
        ]);

        Movie::create([
            'title' => 'Another Round',
            'poster_link' => 'https://m.media-amazon.com/images/M/MV5BOTNjM2Y2ZjgtMDc5NS00MDQ1LTgyNGYtYzYwMTAyNWQwYTMyXkEyXkFqcGdeQXVyMjE4NzUxNDA@._V1_.jpg',
        ]);

        Movie::create([
            'title' => 'Polar',
            'poster_link' => 'https://m.media-amazon.com/images/M/MV5BMzA5MjNjODEtOWYxYi00OTdmLTlhNTAtN2VhMTMxNWJjM2ZmXkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_.jpg',
        ]);

        Movie::create([
            'title' => 'Some film 6',
        ]);

        Movie::create([
            'title' => 'Some film 7',
        ]);

        Movie::create([
            'title' => 'Some film 8',
        ]);

        Movie::create([
            'title' => 'Some film 9',
        ]);

        Movie::create([
            'title' => 'Some film 10',
        ]);
    }
}