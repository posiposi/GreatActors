<?php

namespace App\Services;

use App\Models\Actor;

class ActorService
{
    /**
     * 俳優レコードを全件取得する
     *
     * @return Collection<Actor> $actors
     */
    public function getAllActorList()
    {
        $actors = Actor::all();

        return response()->json(['actors' => $actors]);
    }

    /**
     * 該当の俳優レコードを削除する
     *
     * @param integer $actor_id 削除対象の俳優id
     * @return void
     */
    public function deleteActorRecord(int $actor_id): void
    {
        $actor = Actor::findOrFail($actor_id);
        $actor->delete();
    }

    /**
     * 俳優情報を登録する
     *
     * @param Request $actor_register_request 登録する俳優情報リクエスト
     * @return void
     */
    public function registerActor($actor_register_request)
    {
        $register_params = $actor_register_request->only('actor_name');
        Actor::create($register_params);
    }
}
