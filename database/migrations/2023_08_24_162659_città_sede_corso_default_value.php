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
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('posti_disponibili')->default(0)->change();  // Setting a default value of 0
            // OR
            // $table->integer('posti_disponibili')->nullable()->change();  // Making the column nullable
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('posti_disponibili')->change();  // Removing the default value or nullable property
        });
    }
};
