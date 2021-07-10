<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default(config('app.name'));
            $table->string('site_logo')->default('logo.png');
            $table->string('site_favicon')->default('favicon.ico');

            $table->string('site_description')->nullable();
            $table->string('site_copyright_text')->nullable();

            // Meta
            $table->string('site_meta_description')->nullable();
            $table->string('site_meta_keywords')->nullable();
            $table->string('site_meta_author')->nullable();

            // Contacts
            $table->string('site_contact_no')->nullable();
            $table->string('site_phone')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_working_day_hours')->nullable();

            // Social Links
            $table->string('site_facebook_link')->nullable();
            $table->string('site_youtube_link')->nullable();
            $table->string('site_twitter_link')->nullable();
            $table->string('site_linkedin_link')->nullable();

            // Extra Data (if Needed)
            $table->string('site_custom_data1')->nullable();
            $table->string('site_custom_data2')->nullable();
            $table->string('site_custom_data3')->nullable();
            $table->string('site_custom_data4')->nullable();

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')
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
        Schema::dropIfExists('settings');
    }
}
