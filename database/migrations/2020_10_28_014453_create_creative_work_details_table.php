<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeWorkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_work_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creative_work_id');
            $table->foreign('creative_work_id')->references('id')->on('creative_works')->onDelete('cascade');
            $table->text('title');
            $table->text('desc');
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('creative_work_details');
    }
}
