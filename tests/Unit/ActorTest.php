<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Actor;
use App\Repositories\ActorRepository;
use App\Services\ActorService;

class ActorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 俳優テーブルアクセス用リポジトリクラス
     */
    private $actor_repository;

    /**
     * 俳優モデルのファクトリテスト
     *
     * @return void
     */
    public function testActorFactoryAble()
    {
        // 俳優テーブルにレコードがない前提の確認
        $this->assertEmpty(Actor::first());
        // 俳優テーブルにレコードがファクトリで投入できたかを確認する
        $actors_factory = Actor::factory()->create();
        $this->assertNotEmpty($actors_factory->first());
    }

    /**
     * 俳優登録メソッドテスト
     *
     * @return void
     */
    public function testActorStore()
    {
        // テスト用登録リクエスト
        $response = $this->post(route('actor.store'), [
            'actor_name' => '俳優太郎',
        ]);

        // リクエストと最新の保存内容が一致することを確認
        $latest_actor_record = Actor::latest()->first();
        $this->assertEquals('俳優太郎', $latest_actor_record->actor_name);
    }

    /**
     * 俳優削除メソッドテスト
     *
     * @return void
     */
    public function testActorDelete()
    {
        // 投入テストデータ数
        $data_count = 3;
        // 俳優テーブルにテストデータを投入
        Actor::factory()->count($data_count)->create();

        $actor = Actor::first();
        // 俳優サービスクラス生成時にリポジトリ層をコンストラクタ
        $actor_service = new ActorService(
            $this->actor_repository = new ActorRepository(),
        );
        $actor_service->deleteActorRecord($actor->id);

        // 上記で削除したレコードが存在しないことを確認する
        $this->assertSoftDeleted($actor);
    }
}
