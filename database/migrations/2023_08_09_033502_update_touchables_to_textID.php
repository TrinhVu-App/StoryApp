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
        Schema::table('touchables', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->unsignedBigInteger('textID');
            $table->foreign('textID')->references('id')->on('texts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('touchables', function (Blueprint $table) {
            $table->dropConstrainedForeignId('textID');
            $table->string('name');
        });
    }
};
