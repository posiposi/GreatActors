<?php

namespace App\Services;

use App\Models\Movie;

class MovieService
{
    /**
     * 映画レコードを全件取得する
     *
     * @return Collection<Movie> $movies
     */
    public function getMovieListJson()
    {
        $movies = Movie::all();

        return response()->json(['movies' => $movies]);
    }
}
