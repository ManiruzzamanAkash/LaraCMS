<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('reference_link')->nullable()->comment('If there is possible to keep any reference link');
            $table->unsignedBigInteger('admin_id');

            $table->softDeletes('deleted_at', 0);
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('deleted_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('tracks');
    }
}
