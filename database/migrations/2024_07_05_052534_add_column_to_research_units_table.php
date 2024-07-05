<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('research_units', function (Blueprint $table) {
            $table->string('research_unit_name_en');
        });
    }

    public function down()
    {
        Schema::table('research_units', function (Blueprint $table) {
            $table->string('research_unit_name_en');
        });
    }
};
