<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Actor;

class ActorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
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
}
