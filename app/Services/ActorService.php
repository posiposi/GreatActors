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
}
