<?php

namespace App\Http\Controllers\API;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    
    /**
     * index
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $genres = Genre::paginate(3);
        return response()->json($genres);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GenreRequest $request)
    {
        $genre = Genre::create($request->validated());
    
        return response()->json($genre);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        return response()->json($genre->movies()->paginate(3));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(GenreRequest $request, string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update($request->validated());
    
        return response()->json($genre);
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);

        $genre->delete();

        return response()->json(['message' => 'Genre deleted'], 200);
    }
}