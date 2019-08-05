<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sub_reddit_id');
            $table->string('title');
            $table->longText('body');
            $table->bigInteger('votes')->default(0);
            $table->timestamps();

            // relations
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sub_reddit_id')->references('id')->on('sub_reddits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
