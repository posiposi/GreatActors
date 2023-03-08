<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 映画テーブルのカラムに配給会社ID、ジャンルIDを追加する
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('distributor_id');
            $table->integer('genre_id');
        });
    }

    /**
     * 映画テーブルのカラムから配給会社ID、ジャンルIDを削除する
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('distributor_id');
            $table->dropColumn('genre_id');
        });
    }
};
