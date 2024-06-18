<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('numStudents');
            $table->integer('numCases');
            $table->integer('numMaintenances');
            $table->integer('numSevereMaintenances');
            $table->integer('numDormsCleaning');
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
        Schema::dropIfExists('pm_reports');
    }
}