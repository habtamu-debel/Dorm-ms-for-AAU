<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->text('reason');
            $table->string('medical_documentation')->nullable();
            $table->text('preferred_accommodation');
            $table->text('supporting_information')->nullable();
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
        Schema::dropIfExists('special_accommodations');
    }
}