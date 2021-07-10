<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lang1');
            $table->unsignedBigInteger('lang2');
            $table->unsignedBigInteger('total')->default(0);

            $table->foreign('lang1')->references('id')->on('languages');
            $table->foreign('lang2')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_connections');
    }
}
