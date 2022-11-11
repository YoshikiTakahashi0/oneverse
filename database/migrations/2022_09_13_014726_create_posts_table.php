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
            $table->increments('id');
            $table->string('title', 50);
            $table->string('music');
            $table->string('music_public_id')->nullable();
            $table->string('body', 300)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('plays')->nullable();
            $table->string('image')->nullable();
            $table->string('image_public_id')->nullable();
            $table->integer('tag_id')->unsigned()->nullable();
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
        Schema::dropIfExists('posts');
    }
}
