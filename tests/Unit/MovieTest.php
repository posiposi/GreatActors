<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Movie;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 映画モデルの定義テスト
     *
     * @return void
     */
    public function testMovieFactoryAble()
    {
        // 映画テーブルにレコードがない前提の確認
        self::assertEmpty(Movie::first());
        // 映画テーブルにレコードがファクトリで投入できたかを確認する
        $movies_factory = Movie::factory()->create();
        self::assertNotEmpty($movies_factory->first());
    }
}
