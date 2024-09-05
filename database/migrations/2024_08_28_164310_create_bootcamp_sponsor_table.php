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
        Schema::create('bootcamp_sponsor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bootcamp');
            $table->foreign('id_bootcamp')->references('id')->on('bootcamp')->onDelete('cascade');
            $table->unsignedBigInteger('id_sponsor');
            $table->foreign('id_sponsor')->references('id')->on('sponsor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bootcamp_sponsor');
    }
};
