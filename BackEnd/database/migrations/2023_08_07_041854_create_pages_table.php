<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('storyID');
            $table->foreign('storyID')->references('id')->on('stories');
            $table->unsignedBigInteger('audioID');
            $table->foreign('audioID')->references('id')->on('audios');
            $table->unsignedBigInteger('imageID');
            $table->foreign('imageID')->references('id')->on('images');
            $table->string('text');
            $table->integer('pageNum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
