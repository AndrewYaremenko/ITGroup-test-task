<?php

namespace App\Http\Controllers\API;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    
    /**
     * rulesValidation
     *
     * @var array
     */
    private $rulesValidation = [
        'title' => ['required', 'string', 'min: 2','max:35'],
        'publication_status' => ['boolean'],
        'poster_link' => ['string'],
        'genres' => ['required']
    ];
    
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->json()->all(), $this->rulesValidation);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validated();

        $movie = Movie::create($validatedData);
        $movie->genres()->attach($validatedData['genres']);

        return response()->json($movie);
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
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->json()->all(), $this->rulesValidation);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $validatedData = $validator->validated();

        $movie = Movie::findOrFail($id);

        $movie->genres()->sync($validatedData['genres']);

        $movie->update($validatedData);

        return response()->json($movie);
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