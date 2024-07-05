<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->longText('acedamic_qualification')->nullable();
            $table->string('current_office')->nullable();
            $table->longText('expertise')->nullable();
            $table->longText('experience_n_research')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('insta_url')->nullable();
            $table->string('twitter_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->longText('acedamic_qualification')->nullable();
            $table->string('current_office')->nullable();
            $table->longText('expertise')->nullable();
            $table->longText('experience_n_research')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('insta_url')->nullable();
            $table->string('twitter_url')->nullable();
        });
    }
};
