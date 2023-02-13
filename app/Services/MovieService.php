<?php

namespace App\Service;

use App\Models\Movie;

class MovieService
{
    /**
     * 映画レコードを全件取得する
     *
     * @return Collection<Movie> $movies
     */
    public function getMovieList()
    {
        $movies = Movie::all();

        return $movies;
    }
}
