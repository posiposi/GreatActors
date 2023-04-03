<?php

namespace App\Repositories;

use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    /**
     * 映画レコードを全件取得する
     *
     * @return Collection<Movie> $movies 映画の全件レコード
     */
    public function getMovieList()
    {
        // 配給会社を含めた全映画レコードを取得
        return Movie::with(['distributor', 'genre'])->get();
    }

    /**
     * 映画情報を登録する
     *
     * @param Request $movie_register_request 登録する映画情報リクエスト
     * @return void
     */
    public function registerMovie($movie_register_request)
    {
        $register_params = $movie_register_request->only('movie_name', 'release_year', 'air_time', 'distributor_id', 'genre_id');
        Movie::create($register_params);
    }

    /**
     * 該当の映画レコードを削除する
     *
     * @param integer $movie_id 削除対象の映画id
     * @return void
     */
    public function deleteMovieRecord(int $movie_id)
    {
        $movie = Movie::findOrFail($movie_id);
        $movie->delete();
    }
}
