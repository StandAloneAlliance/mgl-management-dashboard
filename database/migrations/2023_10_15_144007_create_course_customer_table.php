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
        Schema::create('course_customer', function (Blueprint $table) {
         
            $table->unsignedBigInteger('course_id');

            $table->foreign('course_id')->references('id')->on('courses');
 
            $table->unsignedBigInteger('customer_id');
 
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_customer');
    }
};
