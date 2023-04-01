<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 映画-俳優中間テーブルに役割、出演比率カラムを追加する
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actor_movie', function (Blueprint $table) {
            $table->integer('role');
            $table->integer('appearance_rate');
        });
    }

    /**
     * 映画-俳優中間テーブルから役割、出演比率カラムを削除する
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actor_movie', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('appearance_reate');
        });
    }
};
