<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZahlungTable extends Migration
{
    public function up()
    {
        Schema::create('zahlung', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('Mitgliedsbeitrag');
            $table->timestamp('last_paid')->nullable();
            $table->timestamp('paid');
            $table->decimal('betrag', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zahlung');
    }
}