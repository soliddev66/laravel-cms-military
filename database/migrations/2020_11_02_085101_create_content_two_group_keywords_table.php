<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTwoGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_two_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('services');
            $table->string('add_service');
            $table->string('edit_service');
            $table->string('icon');
            $table->string('section_title_and_desc');
            $table->string('features');
            $table->string('add_feature');
            $table->string('edit_feature');
            $table->string('add_counter');
            $table->string('edit_counter');
            $table->string('timer');
            $table->string('counters');
            $table->string('how_to_install');
            $table->string('add_how_to_install');
            $table->string('video_link');
            $table->string('edit_how_to_install');
            $table->string('screenshots');
            $table->string('add_screenshot');
            $table->string('edit_screenshot');
            $table->string('prices');
            $table->string('add_price');
            $table->string('edit_price');
            $table->string('currency');
            $table->string('price');
            $table->string('time');
            $table->string('badge');
            $table->string('please_take_with_features_semicolon');
            $table->string('teams');
            $table->string('add_team');
            $table->string('edit_team');
            $table->string('name');
            $table->string('job');
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
        Schema::dropIfExists('content_two_group_keywords');
    }
}
