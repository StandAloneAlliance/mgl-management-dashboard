<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienti', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->nullable();
            $table->string('cognome', 50)->nullable();
            $table->string('ragione_sociale', 100)->nullable();
            $table->enum('tipo', ['persona', 'azienda'])->default('persona');

            $table->timestamps();
        });

        // Many to Many pivot table between clienti and courses
        Schema::create('clienti_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clienti_id');
            $table->unsignedBigInteger('courses-id');
            // foreign keys between the two tables 
            $table->foreign('clienti_id')->references('id')->on('clienti')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clienti');
        Schema::dropIfExists('clienti_courses');
    }
};
