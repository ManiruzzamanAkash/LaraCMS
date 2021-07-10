<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();

            $table->string('banner_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->text('description')->nullable();
            $table->text('meta_description')->nullable();

            $table->unsignedBigInteger('parent_category_id')
                ->nullable()
                ->comment('Null if category is parent, else parent id');

            $table->boolean('status')->default(1)->comment('1=>active, 0=>inactive');
            $table->boolean('enable_bg')->default(0)->comment('1=>active, 0=>inactive');
            $table->string('bg_color', 20)->default('FFFFFF');
            $table->string('text_color', 20)->default('000000');
            $table->unsignedBigInteger('priority')->default(1);
            $table->softDeletes('deleted_at', 0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->foreign('created_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('updated_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');
            $table->foreign('deleted_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            $table->foreign('parent_category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('categories');
    }
}
