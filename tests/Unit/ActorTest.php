<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Actor;

class ActorTest extends TestCase
{
    use RefreshDatabase;

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
        $this->assertEquals('俳優太郎', $latest_actor_record->movie_name);
    }
}
