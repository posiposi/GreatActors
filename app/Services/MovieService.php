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

    /**
     * 該当の映画レコードを削除する
     *
     * @param integer $movie_id 削除対象の映画id
     * @return void
     */
    public function deleteMovieRecord(int $movie_id): void
    {
        $movie = Movie::findOrFail($movie_id);
        $movie->delete();
    }
}
