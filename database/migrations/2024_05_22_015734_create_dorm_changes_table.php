<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDormChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorm_changes', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('student_name');
            $table->integer('current_dorm_duration');
            $table->string('reason');
            $table->text('description');
            $table->text('room_number_features');
            $table->text('special_needs');
            $table->string('supporting_file')->nullable();
            $table->date('date_of_submission');
            $table->string('contact_details');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dorm_changes');
    }
}