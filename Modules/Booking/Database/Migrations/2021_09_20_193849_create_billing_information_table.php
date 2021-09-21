<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_request_id')->index();
            $table->string('first_name', 100);
            $table->string('last_name', 50)->nullable();
            $table->string('email', 100);
            $table->string('phone_no', 15);
            $table->string('company_name', 100)->nullable();
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('address', 150);
            $table->unsignedInteger('post_code')->nullable();
            $table->text('billing_message')->nullable();

            // Calculation data
            $table->unsignedFloat('booking_hour')->default(1);
            $table->unsignedFloat('booking_subtotal')->default(0);
            $table->unsignedFloat('booking_gst')->default(0);
            $table->unsignedFloat('grand_total')->default(0);
            $table->string('payment_status')->index()->default('pending');
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
        Schema::dropIfExists('billing_information');
    }
}
