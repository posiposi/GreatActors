<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 映画テーブルの上映時間カラムの型をstringに変更
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->string('air_time', 4)->change();
        });
    }

    /**
     * 映画テーブルの上映時間カラムの型をintに変更
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->integer('air_time');
        });
    }
};
