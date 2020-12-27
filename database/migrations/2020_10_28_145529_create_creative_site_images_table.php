<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeSiteImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_site_images', function (Blueprint $table) {
            $table->id();
            $table->text('favicon_image')->nullable();
            $table->text('admin_logo_image')->nullable();
            $table->text('admin_small_logo_image')->nullable();
            $table->text('site_white_logo_image')->nullable();
            $table->text('site_colored_logo_image')->nullable();
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
        Schema::dropIfExists('creative_site_images');
    }
}
