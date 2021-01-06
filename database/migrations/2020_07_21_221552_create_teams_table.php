<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('navigation_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('fahrzeug_id')->nullable();
            $table->bigInteger('antrag_id')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('anrede');
            $table->string('vorname');
            $table->string('nachname');
            $table->string('straße');
            $table->string('plz');
            $table->string('wohnort');
            $table->string('telefon')->nullable();
            $table->string('mobil');
            $table->string('email');
            $table->string('geburtsdatum');
            $table->text('beruf');
            $table->longText('description')->nullable();
            $table->tinyInteger('aktiv')->default(0);
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('image')->nullable();
            $table->string('funktion')->nullable();
            $table->string('emailIntern')->nullable();
            $table->string('ip_adresse', 45)->nullable();
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
        Schema::dropIfExists('teams');
    }
}
