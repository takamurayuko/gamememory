<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // ゲームのタイトルを保存するカラム
            $table->string('url')->nullable();  // 任意のURLを保存するカラム
            $table->string('memo')->nullable();//任意のメモを保存
            $table->unsignedBigInteger('duration_id')->nullable(); // duration_idカラムの追加
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('platform_id')->nullable();
            $table->unsignedBigInteger('genre_id')->nullable();
            
            $table->foreign('duration_id')->references('id')->on('durations'); // 外部キー制約の追加
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('platform_id')->references('id')->on('platforms');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
