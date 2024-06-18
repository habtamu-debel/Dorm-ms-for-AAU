<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emergency', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('student_name');
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
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency');
    }
};
