<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddZahlungTable extends Migration
{
    public function up()
    {
        Schema::table('zahlung', function (Blueprint $table) {
            $table->string('month_year')->after('betrag');
        });
    }

    public function down()
    {
        Schema::table('zahlung', function (Blueprint $table) {
            $table->dropColumn('month_year');
        });
    }
}