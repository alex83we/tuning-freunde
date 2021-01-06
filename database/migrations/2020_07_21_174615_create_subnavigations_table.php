<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubnavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subnavigations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('navigation_id')->unsigned();
            $table->string('name');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('published')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subnavigations');
    }
}
