<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_service_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creative_service_id');
            $table->foreign('creative_service_id')->references('id')->on('creative_services')->onDelete('cascade');
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
        Schema::dropIfExists('creative_service_details');
    }
}
