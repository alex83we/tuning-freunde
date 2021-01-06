<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMieteZahlungTable extends Migration
{
    public function up()
    {
        Schema::create('miete_zahlung', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('miete_id');
            $table->unsignedBigInteger('zahlung_id');
            $table->foreign('miete_id')->references('id')->on('miete_mitgliedsbeitrag');
            $table->foreign('zahlung_id')->references('id')->on('zahlung');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('miete_zahlung');
    }
}