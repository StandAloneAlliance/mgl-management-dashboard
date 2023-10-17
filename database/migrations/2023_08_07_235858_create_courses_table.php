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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nome_corso', 255);
            $table->integer('posti_disponibili');
            $table->integer('cap_sede_corso');
            $table->string('città_di_svolgimento', 25);
            $table->string('indirizzo_di_svolgimento', 40);
            $table->string('provincia', 4);
            $table->string('direttore_corso', 35);
            $table->string('docenti_corso', 35);
            $table->date('inizio_di_svolgimento')->format('/d/m/Y');
            $table->date('fine_svolgimento')->format('/d/m/Y');
            $table->string('genere_corso', 25);
            $table->string('numero_autorizzazione');
            $table->integer('durata_corso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
