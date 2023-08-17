<?php

namespace App\Http\Controllers\API;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    
    /**
     * rulesValidation
     *
     * @var array
     */
    private $rulesValidation = [
        'name' => ['required', 'string', 'min: 3', 'max:30'],
    ];
    
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->json()->all(), $this->rulesValidation);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $genre = Genre::create($validator->validated());

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
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->json()->all(), $this->rulesValidation);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $genre = Genre::findOrFail($id);
        $genre->update($validator->validated());

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