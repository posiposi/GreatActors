<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Movie;
use Faker\Generator as Faker;

class MovieControllerTest extends TestCase
{
    use RefreshDatabase;

    const TABLE_NAME = 'movies';

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return integer
     * @throws \Exception
     */
    private function factory(): int
    {
        $count = random_int(min: 1, max: 9);
        Movie::factory($count)->create();

        return $count;
    }

    /**
     * 映画レコード全件取得テスト
     *
     * @return void
     */
    public function testMoviesIndex(): void
    {
        // ランダムなレコード数を映画テーブルに挿入する
        $count = $this->factory();
        $this->assertDatabaseCount(table: self::TABLE_NAME, count: $count);

        // 全件取得確認
        $all_movies = Movie::all();
        $this->assertCount(expectedCount: $count, haystack: $all_movies);

        // JSONレスポンス確認
        $response = $this->get(route('movies.index'));
        $response->assertOk();
    }
}
