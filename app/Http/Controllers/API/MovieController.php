<?php

namespace App\Http\Controllers\API;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{

    private $rulesValidation = [
        'title' => ['required', 'string', 'min: 2','max:35'],
        'publication_status' => ['boolean'],
        'poster_link' => ['string'],
    ];

    public function index()
    {
        $movies = Movie::paginate(3);
        return response()->json($movies);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->json()->all(), $this->rulesValidation);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $movie = Movie::create($validator->validated());

        return response()->json($movie);
    }

    public function publish(string $id)
    {
        $movie = Movie::find($id);
        return $movie->publish();
    }

    public function show(string $id)
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->json()->all(), $this->rulesValidation);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $movie = Movie::findOrFail($id);
        $movie->update($validator->validated());

        return response()->json($movie);
    }

    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return response()->json(['message' => 'Movie deleted'], 200);
    }
}