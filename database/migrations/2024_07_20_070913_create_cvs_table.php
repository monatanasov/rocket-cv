<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('father_name', 50);
            $table->string('surname', 50);
            $table->date('birth_date');
            $table->unsignedBigInteger('university_id')->nullable();
            $table->timestamps();

            $table
                ->foreign('university_id')
                ->references('id')
                ->on('universities')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
