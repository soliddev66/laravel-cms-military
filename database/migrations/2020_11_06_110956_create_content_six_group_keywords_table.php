<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentSixGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_six_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('sections');
            $table->string('hide');
            $table->string('show');
            $table->string('pages');
            $table->string('add_page');
            $table->string('edit_page');
            $table->string('yes');
            $table->string('no');
            $table->string('display_footer_menu');
            $table->string('display_dropdown');
            $table->string('default_site_language');
            $table->string('please_try_again');
            $table->string('you_are_not_authorized');
            $table->string('which_language');
            $table->string('reminding');
            $table->string('email');
            $table->string('subject');
            $table->string('message');
            $table->string('read_status');
            $table->string('mark_all_as_read');
            $table->string('mark');
            $table->string('messages');
            $table->string('testimonials');
            $table->string('add_testimonial');
            $table->string('edit_testimonial');
            $table->string('comment');
            $table->string('comments');
            $table->string('approval_status');
            $table->string('mark_all_as_approval');
            $table->string('read');
            $table->string('unread');
            $table->string('profile');
            $table->string('change_password');
            $table->string('current_password');
            $table->string('new_password');
            $table->string('confirm_password');
            $table->string('star');
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
        Schema::dropIfExists('content_six_group_keywords');
    }
}
