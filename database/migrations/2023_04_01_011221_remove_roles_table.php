<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 役割テーブルを削除する
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('roles');
    }

    /**
     * 役割テーブルを作成する
     *
     * @return void
     */
    public function down()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->boolean('id')->primary();
            $table->string('role');
            $table->timestamps();
        });
    }
};
