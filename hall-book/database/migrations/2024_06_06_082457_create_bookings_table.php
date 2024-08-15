<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->string('name');
            $table->string('student_no')->nullable();
            $table->string('nic_no')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('faculty')->nullable();
            $table->string('society')->nullable();
            $table->string('institution')->nullable();
            $table->string('post')->nullable();
            $table->string('category');
            $table->string('event_type')->nullable();
            $table->string('department')->nullable();
            $table->string('address')->nullable();
            $table->string('division')->nullable();
            $table->text('event_description')->nullable();
            $table->json('booking_dates');
            $table->json('facilities')->nullable();
            $table->json('documents')->nullable();
            $table->string('status')->default("pending");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}