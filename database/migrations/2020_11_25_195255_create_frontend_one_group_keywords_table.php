<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendOneGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_one_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('home');
            $table->string('back_to_home');
            $table->string('about');
            $table->string('about_us');
            $table->string('services');
            $table->string('service_details');
            $table->string('pricing');
            $table->string('portfolio');
            $table->string('work_details');
            $table->string('blog');
            $table->string('blogs');
            $table->string('contact');
            $table->string('monthly');
            $table->string('yearly');
            $table->string('annualy');
            $table->string('admin');
            $table->string('read_more');
            $table->string('please_fill_required_fields');
            $table->string('email_is_invalid');
            $table->string('send_message');
            $table->string('your_name');
            $table->string('your_email');
            $table->string('subject');
            $table->string('your_message');
            $table->string('your_comment');
            $table->string('your_message_has_been_delivered');
            $table->string('your_comment_is_pending_approval');
            $table->string('help');
            $table->string('contact_info');
            $table->string('copyright');
            $table->string('updating');
            $table->string('all');
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
        Schema::dropIfExists('frontend_one_group_keywords');
    }
}
