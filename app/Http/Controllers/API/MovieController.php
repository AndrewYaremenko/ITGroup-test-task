<?php

namespace App\Http\Controllers\API;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;

class MovieController extends Controller
{
    
    /**
     * index
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $movies = Movie::with('genres')->paginate(3);
        return response()->json($movies);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MovieRequest $request)
    {
        $validatedData = $request->validated();

        $movie = Movie::create($validatedData);
        $movie->genres()->attach($validatedData['genres']);
    
        return response()->json($movie->load('genres'));
    }
    
    /**
     * publish
     *
     * @param  mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function publish(string $id)
    {
        $movie = Movie::find($id);
        return $movie->publish();
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        return response()->json($movie);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MovieRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $movie = Movie::findOrFail($id);
        $movie->genres()->sync($validatedData['genres']);
        $movie->update($validatedData);
    
        return response()->json($movie->load('genres'));
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return response()->json(['message' => 'Movie deleted'], 200);
    }
}