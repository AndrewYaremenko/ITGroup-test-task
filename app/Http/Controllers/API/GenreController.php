    <?php

    namespace App\Http\Controllers\API;

    use App\Models\Genre;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class GenreController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $genres = Genre::paginate(3);
            return response()->json($genres);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $genre = Genre::findOrFail($id);
            return response()->json($genre->movies()->paginate(3));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }