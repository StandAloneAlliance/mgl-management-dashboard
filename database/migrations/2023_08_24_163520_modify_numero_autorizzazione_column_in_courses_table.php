<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNumeroAutorizzazioneColumnInCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('numero_autorizzazione')->change();
        });
    }

    public function down()
    {
        // If you want to revert the column back to integer in the future, you can do so here.
        // $table->integer('numero_autorizzazione')->change();
    }
}
