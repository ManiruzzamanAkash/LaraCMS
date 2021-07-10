<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category')->nullable()->index();
            $table->unsignedBigInteger('country')->default(null)->nullable()->index();
            $table->unsignedBigInteger('language')->default(null)->nullable()->index();

            $table->boolean('menu')->default(0)->nullable()->index();
            $table->boolean('content')->default(0)->nullable()->index();
            $table->unsignedBigInteger('page_id')->nullable()->index();
            $table->boolean('footer')->default(0)->nullable()->index();

            // Languages Data Columns
            $table->string('key')->index()->nullable();
            $table->text('en')->nullable();
            $table->text('fi')->nullable();
            $table->text('se')->nullable();
            $table->text('no')->nullable();
            $table->text('dk')->nullable();
            $table->text('de')->nullable();
            $table->text('it')->nullable();
            $table->text('fr')->nullable();
            $table->text('es')->nullable();
            $table->text('pl')->nullable();

            $table->text('al')->nullable();
            $table->text('ru')->nullable();
            $table->text('ar')->nullable();
            $table->text('bn')->nullable();
            $table->text('so')->nullable();
            $table->text('ku')->nullable();
            $table->text('vi')->nullable();
            $table->text('cn')->nullable();
            $table->text('sr')->nullable();
            $table->text('tr')->nullable();

            $table->unsignedInteger('order_nr')->default(1);
            $table->boolean('status')->default(1)->comment('Default will be approved = 1');

            $table->unsignedBigInteger('created_by')->comment('Created By User');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('country')->references('id')->on('countries');
            $table->foreign('language')->references('id')->on('languages');
            $table->foreign('page_id')->references('id')->on('pages');
            $table->softDeletes();
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
        Schema::dropIfExists('terms');
    }
}
