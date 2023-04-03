<?php

namespace App\Repositories;

interface MovieRepositoryInterface
{
    /**
     * 映画レコードを全件取得する
     *
     * @return void
     */
    public function getMovieList();

    /**
     * 映画情報を登録する
     *
     * @param Request $movie_register_request 登録する映画情報リクエスト
     * @return void
     */
    public function registerMovie($movie_register_request);

    /**
     * 該当の映画レコードを削除する
     *
     * @param integer $movie_id 削除対象の映画id
     * @return void
     */
    public function deleteMovieRecord(int $movie_id);
}
