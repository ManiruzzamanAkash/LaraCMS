<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('category')->comment('Main Category Name, e.g: Education');

            $table->unsignedBigInteger('chapter_id');
            $table->string('chapter')->comment('Sub category Name or chapter name');

            // Languages Data Columns
            $table->string('en')->nullable();
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
            $table->boolean('status')->default(0)->comment('Default will be pending = 0');
            $table->boolean('is_section')->default(0)->comment('Will be used as section or not');

            $table->unsignedBigInteger('created_by')->comment('Created By User');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('chapter_id')->references('id')->on('categories');
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
        Schema::dropIfExists('words');
    }
}
