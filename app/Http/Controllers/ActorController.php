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
     * 俳優レコードを登録する
     *
     * @param Request $request 登録する俳優のリクエスト
     * @return void
     */
    public function store(Request $request)
    {
        $this->actor_service->registerActor($request);
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
     * 該当の俳優レコードを削除する
     *
     * @param int $actor_id 削除対象の俳優id
     * @return void
     */
    public function destroy($actor_id)
    {
        $this->actor_service->deleteActorRecord($actor_id);
    }
}
