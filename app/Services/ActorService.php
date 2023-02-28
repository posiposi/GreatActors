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
}
