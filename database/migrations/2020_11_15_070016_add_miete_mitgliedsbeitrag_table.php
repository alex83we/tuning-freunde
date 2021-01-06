<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMieteMitgliedsbeitragTable extends Migration
{
    public function up()
    {
        Schema::table('miete_mitgliedsbeitrag', function (Blueprint $table) {
            $table->string('type')->default('Mitgliedsbeitrag')->after('betrag');
        });
    }

    public function down()
    {
        Schema::table('', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}