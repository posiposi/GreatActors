<?php

namespace App\Repositories;

interface ActorRepositoryInterface
{
    /**
     * 俳優レコードを全件取得する
     *
     * @return void
     */
    public function findAllActors();

    /**
     * 該当の俳優レコードを削除する
     *
     * @param integer $actor_id 削除対象の俳優ID
     * @return void
     */
    public function deleteActor(int $actor_id): void;

    /**
     * 俳優のレコードを登録する
     *
     * @param Request $actor_register_request 登録する俳優の情報リクエスト
     * @return void
     */
    public function registerActor($actor_register_request): void;
}
