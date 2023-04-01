<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 映画-俳優中間テーブルから役割IDカラムを削除する
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actor_movie', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }

    /**
     * 映画-俳優中間テーブルに役割IDカラムを追加する
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actor_movie', function (Blueprint $table) {
            $table->boolean('role_id')->default(false);
        });
    }
};
