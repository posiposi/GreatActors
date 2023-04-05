<?php

namespace App\Repositories;

use App\Models\Actor;

class ActorRepository implements ActorRepositoryInterface
{
    /**
     * 俳優レコードを全件取得する
     *
     * @return void
     */
    public function findAllActors()
    {
        return Actor::all();
    }

    /**
     * 該当の俳優レコードを削除する
     *
     * @param integer $actor_id 削除対象の俳優id
     * @return void
     */
    public function deleteActor(int $actor_id): void
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
    public function registerActor($actor_register_request): void
    {
        $register_params = $actor_register_request->only('actor_name');
        Actor::create($register_params);
    }
}
