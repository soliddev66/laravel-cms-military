<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('banner');
            $table->string('fixed_content');
            $table->string('background_image');
            $table->string('sliders');
            $table->string('video');
            $table->string('about');
            $table->string('services');
            $table->string('features');
            $table->string('counters');
            $table->string('how_to_install');
            $table->string('screenshots');
            $table->string('prices');
            $table->string('teams');
            $table->string('faqs');
            $table->string('site_info');
            $table->string('site_images');
            $table->string('homepage_versions');
            $table->string('google_analytic');
            $table->string('sections');
            $table->string('color');
            $table->string('seo');
            $table->string('categories');
            $table->string('blogs');
            $table->string('contact');
            $table->string('contact_info');
            $table->string('apps');
            $table->string('settings');
            $table->string('themes');
            $table->string('languages');
            $table->string('logout');
            $table->string('skills');
            $table->string('works');
            $table->string('call_to_action');
            $table->string('galleries');
            $table->string('external_url');
            $table->string('socials');
            $table->string('quick_access_buttons');
            $table->string('breadcrumb');
            $table->string('pages');
            $table->string('messages');
            $table->string('testimonials');
            $table->string('notifications');
            $table->string('profile');
            $table->string('change_password');
            $table->string('data_language');
            $table->string('dashboard');
            $table->string('optimizer');
            $table->string('user_management');
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
        Schema::dropIfExists('menu_keywords');
    }
}
