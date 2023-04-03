<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;

class MovieController extends Controller
{
    private $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * 映画レコード全件を取得する
     *
     * @return array 映画レコード(全件)
     */
    public function index()
    {
        return $this->movieService->getMovieListJson();
    }

    /**
     * 映画情報を登録する
     *
     * @param Request $request 登録する映画情報リクエスト
     * @return void
     */
    public function store(Request $request)
    {
        $this->movieService->registerMovie($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 該当の映画レコードを削除する
     *
     * @param int $movie_id 削除対象の映画id
     * @return void
     */
    public function destroy(int $movie_id)
    {
        $this->movieService->deleteMovieRecord($movie_id);
    }
}
