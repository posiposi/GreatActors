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

    /**
     * 映画-俳優テーブル間リレーションテスト
     *
     * @return void
     */
    public function testMovieBelongsToManyActor()
    {
        // 投入テストデータ数
        $data_count = 3;
        // 映画テーブル、俳優テーブルにテストデータを投入
        Movie::factory()->has(Actor::factory()->count($data_count))->make();

        $this->assertEquals(Movie::count(), Actor::count());
    }

    /**
     * 映画削除メソッドテスト
     *
     * @return void
     */
    public function testMovieDelete()
    {
        // 投入テストデータ数
        $data_count = 3;
        // 映画テーブルにテストデータを投入
        Movie::factory()->count($data_count)->create();

        $movie = Movie::first();
        $movie->delete();
        // 上記で削除したレコードが存在しないことを確認する
        $this->assertSoftDeleted($movie);
    }

    /**
     * 映画登録メソッドテスト
     *
     * @return void
     */
    public function testMovieStore()
    {
        // テスト用登録リクエスト
        $response = $this->post(route('movie.store'), [
            'movie_name' => 'テスト映画名',
            'release_year' => 9999,
            'air_time' => 999,
        ]);

        // リクエストと保存内容が一致することを確認
        $latest_movie_record = Movie::latest()->first();
        $this->assertEquals('テスト映画名', $latest_movie_record->movie_name);
        $this->assertEquals(9999, $latest_movie_record->release_year);
        $this->assertEquals(999, $latest_movie_record->air_time);
    }
}
