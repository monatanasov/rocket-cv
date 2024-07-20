<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_skill', function (Blueprint $table) {
            $table->bigInteger('cv_id')->unsigned();
            $table->bigInteger('skill_id')->unsigned();

            $table
                ->foreign('cv_id')
                ->references('id')
                ->on('cvs')
                ->onDelete('cascade');

            $table
                ->foreign('skill_id')
                ->references('id')
                ->on('tech_skills')
                ->onDelete('cascade');

            $table->unique(['cv_id', 'skill_id']);
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('cv_skill');
    }
};
