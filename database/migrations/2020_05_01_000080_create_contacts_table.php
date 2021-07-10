<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('message');
            $table->string('subject');
            $table->string('country')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('status')->default(0)->comment('0 = not seen by admin, 1 = seen by admin');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('updated_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

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
        Schema::dropIfExists('contacts');
    }
}
