<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 配給会社テーブル作成マイグレーションを実行する
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('movie_id');
            $table->string('distributor_name');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['id', 'movie_id']);
        });

        Schema::table('distributors', function (Blueprint $table) {
            $table->increments('id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributors');
    }
};
