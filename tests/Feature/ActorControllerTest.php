<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Actor;

/**
 * 俳優コントローラテストクラス
 */
class ActorControllerTest extends TestCase
{
    use RefreshDatabase;

    const TABLE_NAME = 'actors';

    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return integer $count 生成するテストデータ数
     * @throws \Exception
     */
    private function factory(): int
    {
        $count = random_int(min: 1, max: 5);
        Actor::factory($count)->create();

        return $count;
    }

    /**
     * 俳優レコード全件取得テスト
     *
     * @return void
     */
    public function testActorsIndex(): void
    {
        // ランダムなレコード数を俳優テーブルに挿入する
        $count = $this->factory();
        $this->assertDatabaseCount(table: self::TABLE_NAME, count: $count);

        // 全件取得確認
        $all_actors = Actor::all();
        $this->assertCount(expectedCount: $count, haystack: $all_actors);

        // JSONレスポンス確認
        $response = $this->get(route('actors.index'));
        $response->assertOk();
    }
}
