<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddZahlungTeamIdTable extends Migration
{
    public function up()
    {
        Schema::table('zahlung', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->after('id');
        });
    }

    public function down()
    {
        Schema::table('zahlung', function (Blueprint $table) {
            $table->dropColumn('team_id');
        });
    }
}