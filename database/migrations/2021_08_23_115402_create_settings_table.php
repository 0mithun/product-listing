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
            $table->string('name');
            $table->text('about');
            $table->string('email');
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('full_address')->nullable();
            $table->text('phone')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('pinterest')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('favicon_image')->nullable();
            $table->string('og_image')->nullable();
            $table->string('header_css')->nullable();
            $table->string('header_script')->nullable();
            $table->string('body_script')->nullable();
            $table->string('sidebar_color')->nullable();
            $table->string('nav_color')->nullable();
            $table->boolean('dark_mode')->default(false);
            $table->boolean('commingsoon_mode')->default(0);
            $table->boolean('search_engine_indexing')->default(1);
            $table->boolean('google_analytics')->default(0);
            $table->boolean('facebook_pixel')->default(0);
            $table->boolean('default_layout')->default(true);
            $table->string('copyright_text')->nullable();
            $table->text('map_text')->nullable();
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
