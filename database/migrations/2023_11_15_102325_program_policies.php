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
        Schema::create('program_policies', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id')->nullable();
            $table->integer('discipline_id')->nullable();
            $table->integer('policy_category_id')->nullable();
            $table->string('policy')->nullable();
            $table->string('operator')->nullable();
            $table->integer('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('program_policies');
        
    }
};
