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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->integer('invoice_type')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('dis_ids')->nullable();
            $table->string('disciplines')->nullable();
            $table->integer('total_amount')->nullable();
            $table->text('description')->nullable();
            $table->text('status_description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
