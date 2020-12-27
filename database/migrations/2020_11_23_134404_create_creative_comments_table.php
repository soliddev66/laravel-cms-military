<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creative_blog_id')->nullable();
            $table->foreign('creative_blog_id')->references('id')->on('creative_blogs')->onDelete('cascade');
            $table->string('name');
            $table->text('comment');
            $table->string('approval')->default(0);
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
        Schema::dropIfExists('creative_comments');
    }
}
