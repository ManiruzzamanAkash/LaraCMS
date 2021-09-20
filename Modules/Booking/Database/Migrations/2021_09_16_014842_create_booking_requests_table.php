<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('phone_no', 20);
            $table->string('email', 100);
            $table->unsignedBigInteger('service_id')->index();
            $table->string('service_name', 100);
            $table->unsignedBigInteger('service_category_id')->index();
            $table->string('service_category_name', 100);
            $table->unsignedBigInteger('booking_rate_id')->index();
            $table->string('booking_rate_name', 100);
            $table->unsignedFloat('booking_rate_value', 8, 2)->default(0);
            $table->date('start_date');
            $table->time('start_time');
            $table->text('message')->nullable();
            $table->string('status')->index()->default('pending');
            $table->dateTime('expired_at')->nullable();
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
        Schema::dropIfExists('booking_requests');
    }
}
