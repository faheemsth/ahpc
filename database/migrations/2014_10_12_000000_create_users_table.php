<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('postel_address')->nullable();
            $table->string('tehsil')->nullable();
            $table->string('district')->nullable();
            $table->string('province')->nullable();
            $table->string('student_num')->default(0);
            $table->text('doe')->nullable();
            $table->string('institute')->nullable();
            $table->integer('inst_prf_completion')->default(50);
            $table->integer('program_uploaded')->default(0);
            $table->integer('documents_uploaded')->default(0);
            $table->string('institute_type')->nullable();
            $table->text('discipline')->nullable();
            $table->string('ceo_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('cnic_no')->nullable();
            $table->string('qualification')->nullable();
            $table->string('website_url')->nullable();
            $table->string('contact')->nullable();
            $table->integer('inst_approval_status')->nullable();
            $table->text('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->integer('role_id')->nullable();
            $table->string('declaration')->nullable();
            $table->text('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        // User::create(['name' => 'admin','email' => 'zamurradkhan@demo.com','password' => Hash::make('12345678'),'email_verified_at'=>'2022-01-02 17:04:58','avatar' => 'khan.jpg','created_at' => now(),]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
