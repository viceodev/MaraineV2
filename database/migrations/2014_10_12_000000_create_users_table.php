<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('reg_no')->unique();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('level');
            $table->date('payment_due_date')->nullable();
            $table->json('courses')->nullable();
            $table->json('email_preference');
            $table->json('payment_options')->nullable();
            $table->date('dob')->nullable();
            $table->string('banned')->nullable();
            $table->string('picture');
            $table->string('role');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
