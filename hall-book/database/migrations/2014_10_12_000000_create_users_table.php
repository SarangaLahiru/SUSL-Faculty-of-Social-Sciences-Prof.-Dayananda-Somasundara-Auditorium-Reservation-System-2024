<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('NIC')->unique();
        $table->string('phone_number')->unique();
        $table->string('email')->unique();
        $table->string('student_no')->nullable();
        $table->string('faculty')->nullable();
        $table->string('department')->nullable();
        $table->string('institution')->nullable();
        $table->string('division')->nullable();
        $table->string('society')->nullable();
        $table->string('post')->nullable();
        $table->string('address')->nullable();
        $table->string('category');
        $table->string('password');
        $table->string('remember_token')->nullable();
        $table->timestamp('email_verified_at')->nullable();
        $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}