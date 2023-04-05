<?php

namespace App\Services;

use App\Models\Actor;
use App\Repositories\ActorRepository;

class ActorService
{
    private $actor_repository;

    /**
     * 俳優テーブルへのアクセス用リポジトリコンストラクタ
     *
     * @param ActorRepository $actor_repository 俳優テーブルアクセス用リポジトリ
     */
    public function __construct(ActorRepository $actor_repository)
    {
        $this->actor_repository = $actor_repository;
    }

    /**
     * 俳優一覧を取得する
     *
     * @return Collection<Actor> $actors 俳優全件レコード
     */
    public function getActorsList()
    {
        $actors = $this->actor_repository->findAllActors();

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
        $this->actor_repository->deleteActor($actor_id);
    }

    /**
     * 俳優情報を登録する
     *
     * @param Request $actor_register_request 登録する俳優情報リクエスト
     * @return void
     */
    public function registerActorRecord($actor_register_request): void
    {
        $this->actor_repository->registerActor($actor_register_request);
    }
}
