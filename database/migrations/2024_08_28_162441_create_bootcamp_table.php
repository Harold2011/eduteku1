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
        Schema::create('bootcamp', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 2000);
            $table->string('img_url', 300);
            $table->string('file', 300);
            $table->string('url_course', 300);
            $table->unsignedBigInteger('id_challenge_filter_category');
            $table->foreign('id_challenge_filter_category')->references('id')->on('challenge_filter_category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('bootcamp');
    }
};
