<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieGenreSeeder extends Seeder
{

    public function run(): void
    {

        $actionGenre = Genre::where('name', 'Action')->first();
        $dramaGenre = Genre::where('name', 'Drama')->first();
        $comedyGenre = Genre::where('name', 'Comedy')->first();
        $thrillerGenre = Genre::where('name', 'Thriller')->first();
        $crimeGenre = Genre::where('name', 'Crime')->first();
        $romanceGenre = Genre::where('name', 'Romance')->first();

        Movie::find(1)->genres()->attach([$actionGenre->id, $dramaGenre->id, $romanceGenre->id, $thrillerGenre->id, $crimeGenre->id]);
        Movie::find(2)->genres()->attach([$actionGenre->id, $dramaGenre->id, $romanceGenre->id, $thrillerGenre->id, $crimeGenre->id]);
        Movie::find(3)->genres()->attach([$comedyGenre->id, $romanceGenre->id]);
        Movie::find(4)->genres()->attach([$comedyGenre->id, $dramaGenre->id]);
        Movie::find(5)->genres()->attach([$actionGenre->id]);
        Movie::find(6)->genres()->attach([$dramaGenre->id, $romanceGenre->id, $thrillerGenre->id]);
        Movie::find(7)->genres()->attach([$romanceGenre->id, $crimeGenre->id, $actionGenre->id]);
        Movie::find(8)->genres()->attach([$crimeGenre->id, $actionGenre->id, $thrillerGenre->id]);
        Movie::find(9)->genres()->attach([$thrillerGenre->id]);
        Movie::find(10)->genres()->attach([$romanceGenre->id]);
    }
}
