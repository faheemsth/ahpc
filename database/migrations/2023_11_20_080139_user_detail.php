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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('father_name')->nullable();
            $table->string('title')->nullable();
            $table->string('duration')->nullable();
            $table->string('registration_no')->nullable();
            $table->date('issue_date')->nullable();
            $table->tinyInteger('first_time_registration')->default(1);
            $table->string('last_registration_expire_date')->nullable();
            $table->string('fee_slip_no')->nullable();
            $table->date('fee_deposit_date')->nullable();
            $table->double('fee_amount')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('user_details');
    }
};
