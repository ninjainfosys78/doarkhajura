<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agronomies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('quotes')->nullable();
            $table->string('quotes_en')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('research_unit_id')->nullable()->constrained('research_units')->cascadeOnDelete();
            $table->foreignId('scientist_id')->nullable()->constrained('employees')->cascadeOnDelete();
            $table->foreignId('technical_officer_id')->nullable()->constrained('employees')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agronomies');
    }
};
