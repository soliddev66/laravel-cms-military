<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendTwoGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_two_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('recent_posts');
            $table->string('by');
            $table->string('pages');
            $table->string('comments');
            $table->string('reply');
            $table->string('leave_a_comment');
            $table->string('search');
            $table->string('search_results');
            $table->string('search_here');
            $table->string('nothing_found');
            $table->string('categories');
            $table->string('links');
            $table->string('contact_us');
            $table->string('view_more');
            $table->string('galleries');
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
        Schema::dropIfExists('frontend_two_group_keywords');
    }
}
