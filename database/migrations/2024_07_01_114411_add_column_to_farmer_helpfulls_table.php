<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('farmer_helpfulls', function (Blueprint $table) {
            $table->foreignId('research_unit_id')->nullable()->constrained('research_units')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('farmer_helpfulls', function (Blueprint $table) {
            $table->foreignId('research_unit_id');
        });
    }
};
