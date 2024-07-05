<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('research_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_unit_id')->nullable()->constrained('research_units')->cascadeOnDelete();
            $table->string('research_unit_name');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('research_units');
    }
};
