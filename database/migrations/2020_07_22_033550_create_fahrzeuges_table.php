<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFahrzeugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fahrzeuges', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('album_id')->nullable();
            $table->bigInteger('team_id')->nullable();
            $table->bigInteger('antrag_id')->nullable();
            $table->string('title');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('fahrzeug');
            $table->string('baujahr');
            $table->text('besonderheiten')->nullable();
            $table->text('motor');
            $table->text('karosserie')->nullable();
            $table->text('felgen')->nullable();
            $table->text('fahrwerk')->nullable();
            $table->text('bremsen')->nullable();
            $table->text('innenraum')->nullable();
            $table->text('anlage')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('published')->default(0)->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('fahrzeuges');
    }
}
