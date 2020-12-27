<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentFourGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_four_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('tag');
            $table->string('author');
            $table->string('category');
            $table->string('post_date');
            $table->string('view');
            $table->string('homepage_versions');
            $table->string('choose_version');
            $table->string('map_iframe');
            $table->text('map_iframe_desc_placeholder');
            $table->string('contact');
            $table->string('add_contact');
            $table->string('edit_contact');
            $table->string('apps');
            $table->string('add_app');
            $table->string('edit_app');
            $table->string('site_images');
            $table->string('themes');
            $table->string('choose_theme');
            $table->string('animated_desc');
            $table->string('top_title');
            $table->string('skills');
            $table->string('add_skill');
            $table->string('edit_skill');
            $table->string('section_title');
            $table->string('percent_rate');
            $table->string('add_service_item');
            $table->string('edit_service_item');
            $table->string('item');
            $table->string('works');
            $table->string('add_work');
            $table->string('edit_work');
            $table->string('likes');
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
        Schema::dropIfExists('content_four_group_keywords');
    }
}
