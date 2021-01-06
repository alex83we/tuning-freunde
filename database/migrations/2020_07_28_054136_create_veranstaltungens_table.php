<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeranstaltungensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veranstaltungens', function (Blueprint $table) {
            $table->id();
            $table->timestamp('datum_von')->nullable();
            $table->timestamp('datum_bis')->nullable();
            $table->string('veranstaltung')->nullable();
            $table->string('veranstaltungsort')->nullable();
            $table->string('veranstalter')->nullable();
            $table->mediumText('beschreibung')->nullable();
            $table->string('social_fb')->nullable();
            $table->string('social_ig')->nullable();
            $table->string('social_tw')->nullable();
            $table->string('webseite')->nullable();
            $table->string('slug');
            $table->string('name');
            $table->string('title');
            $table->string('eintritt')->nullable();
            $table->tinyInteger('published')->default(0);
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
        Schema::dropIfExists('veranstaltungens');
    }
}
