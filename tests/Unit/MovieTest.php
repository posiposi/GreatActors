<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Movie;
use App\Models\Actor;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 映画モデルのファクトリテスト
     *
     * @return void
     */
    public function testMovieFactoryAble()
    {
        // 映画テーブルにレコードがない前提の確認
        $this->assertEmpty(Movie::first());
        // 映画テーブルにレコードがファクトリで投入できたかを確認する
        $movies_factory = Movie::factory()->create();
        $this->assertNotEmpty($movies_factory->first());
    }

    public function testMovieBelongsToManyActor()
    {
        // 投入テストデータ数
        $data_count = 3;
        // 映画テーブル、俳優テーブルにテストデータを投入
        Movie::factory()->has(Actor::factory()->count($data_count))->make();

        $this->assertEquals(Movie::count(), Actor::count());
    }
}
