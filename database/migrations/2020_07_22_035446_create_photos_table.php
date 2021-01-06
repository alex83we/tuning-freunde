<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('album_id')->unsigned();
            $table->string('title');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('size');
            $table->string('images');
            $table->string('description');
            $table->tinyInteger('published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
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
        Schema::dropIfExists('photos');
    }
}
