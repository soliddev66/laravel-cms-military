<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentFiveGroupKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_five_group_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('add_work_item');
            $table->string('edit_work_item');
            $table->string('work_items');
            $table->string('call_to_action');
            $table->string('galleries');
            $table->string('add_gallery');
            $table->string('edit_gallery');
            $table->string('monthly');
            $table->string('yearly');
            $table->string('languages');
            $table->string('add_language');
            $table->string('edit_language');
            $table->string('language_name');
            $table->string('language_code');
            $table->string('direction');
            $table->string('keywords');
            $table->string('for_admin_panel');
            $table->string('for_frontend');
            $table->string('content_group');
            $table->string('menu');
            $table->string('service_items');
            $table->string('external_url');
            $table->string('socials');
            $table->string('add_social');
            $table->string('edit_social');
            $table->string('quick_access_buttons');
            $table->string('email_or_phone');
            $table->string('breadcrumb');
            $table->string('color');
            $table->string('color_code');
            $table->string('ready_color_option');
            $table->string('this_color_option_will_be_deleted');
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
        Schema::dropIfExists('content_five_group_keywords');
    }
}
