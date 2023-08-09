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
        Schema::create('touchables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pageID');
            $table->foreign('pageID')->references('id')->on('pages');
            $table->string('name');
            $table->unsignedBigInteger('audioID');
            $table->foreign('audioID')->references('id')->on('audios');
            $table->unsignedBigInteger('imageID');
            $table->foreign('imageID')->references('id')->on('images');
            $table->double('height');
            $table->double('width');
            $table->double('xPosition');
            $table->double('yPosition');
            $table->integer('blinkOrder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('touchables');
    }
};
