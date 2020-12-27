<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeQuickAccessButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_quick_access_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('social_media');
            $table->string('link')->nullable();
            $table->integer('status')->default(1);
            $table->string('contact');
            $table->string('email_or_phone')->nullable();
            $table->integer('status_phone')->default(1);
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
        Schema::dropIfExists('creative_quick_access_buttons');
    }
}
