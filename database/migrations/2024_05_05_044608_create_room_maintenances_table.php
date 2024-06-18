<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('room_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('room_number');
            $table->string('maintenance_type');
            $table->string('urgency');
            $table->string('attachment')->nullable();
            $table->date('date');
            $table->text('description');
            $table->string('contact');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('student_id')->references('studentid')->on('students')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_maintenances');
    }
};
