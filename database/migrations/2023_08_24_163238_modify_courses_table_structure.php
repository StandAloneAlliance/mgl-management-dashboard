<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCoursesTableStructure extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            // List of columns to retain
            $columnsToRetain = [
                'nome_corso',
                'numero_autorizzazione',
                'genere_corso',
                'indirizzo_di_svolgimento',
                'inizio_di_svolgimento',
                'fine_svolgimento',
                'updated_at',
                'created_at'
            ];

            // Get a list of all columns in the table
            $allColumns = Schema::getColumnListing('courses');

            // Drop columns not in the retain list
            foreach ($allColumns as $column) {
                if (!in_array($column, $columnsToRetain)) {
                    $table->dropColumn($column);
                }
            }
        });
    }

    public function down()
    {
        // Logic to revert the changes, if necessary.
        // For simplicity, I'm not including the exact reversal logic here.
        // You can add columns back or make other necessary adjustments.
    }
}
