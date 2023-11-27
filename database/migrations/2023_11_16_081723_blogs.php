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
        //
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('feature_image')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->text('related_image1')->nullable();
            $table->text("related_image2")->nullable();
            $table->string('button')->nullable();
            $table->string('button_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('blogs');
    }
};
