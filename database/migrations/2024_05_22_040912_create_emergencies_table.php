<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->nullable();
            $table->string('student_name')->nullable();
            $table->string('request_type');
            $table->text('description');
            $table->string('contact_phone');
            $table->string('urgency_level');
            $table->string('supporting_media')->nullable();
            $table->string('location_of_emergency');
            $table->string('building_name')->nullable();
            $table->string('room_number')->nullable();
            $table->string('other_location')->nullable();
            $table->timestamps();

            // Add the foreign key constraint
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergencies');
    }
}