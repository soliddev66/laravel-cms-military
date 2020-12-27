<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentThreeGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_three_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('link');
            $table->string('faqs');
            $table->string('add_faq');
            $table->string('edit_faq');
            $table->string('question');
            $table->string('answer');
            $table->string('site_info');
            $table->string('copyright');
            $table->string('favicon_image');
            $table->string('admin_logo_image');
            $table->string('admin_small_logo_image');
            $table->string('site_white_logo_image');
            $table->string('site_colored_logo_image');
            $table->string('google_analytic');
            $table->string('seo');
            $table->string('site_name');
            $table->string('site_desc');
            $table->string('site_keywords');
            $table->string('seperate_with_commas');
            $table->string('categories');
            $table->string('add_category');
            $table->string('edit_category');
            $table->string('category_name');
            $table->string('status');
            $table->string('select_your_option');
            $table->string('enable');
            $table->string('disable');
            $table->string('please_create_a_category');
            $table->string('blogs');
            $table->string('add_blog');
            $table->string('edit_blog');
            $table->string('short_desc');
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
        Schema::dropIfExists('content_three_group_keywords');
    }
}
