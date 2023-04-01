<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 出演比率テーブルを削除する
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('rates');
    }

    /**
     * 出演比率テーブルを作成する
     *
     * @return void
     */
    public function down()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('appearance_rate', 4);
            $table->timestamps();
        });
    }
};
