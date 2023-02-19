<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MovieService;

class MovieController extends Controller
{
    private $movie_service;

    public function __construct()
    {
        $this->movie_service = app()->make(MovieService::class);
    }

    /**
     * 映画レコード全件を取得する
     *
     * @return array 映画レコード(全件)
     */
    public function getAllMovieList()
    {
        return $this->movie_service->getMovieListJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->movie_service->deleteMovieRecord($movie_id);
    }
}
