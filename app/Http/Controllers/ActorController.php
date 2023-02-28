<?php

namespace App\Http\Controllers;

use App\Services\ActorService;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    private $actor_service;

    public function __construct()
    {
        $this->actor_service = app()->make(ActorService::class);
    }

    /**
     * 俳優レコード全件を取得する
     *
     * @return array 俳優レコード(全件)
     */
    public function index()
    {
        return $this->actor_service->getAllActorList();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
