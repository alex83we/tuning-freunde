<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMieteMitgliedsbeitragTable extends Migration
{
    public function up()
    {
        Schema::create('miete_mitgliedsbeitrag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->decimal('betrag', 8, 2);
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('miete_mitgliedsbeitrag');
    }
}