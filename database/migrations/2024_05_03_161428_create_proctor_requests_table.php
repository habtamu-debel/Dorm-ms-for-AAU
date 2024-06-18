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
        Schema::create('proctor_requests', function (Blueprint $table) {
            $table->id();
            $table->string('requestId')->unique();
            $table->string('category');
            $table->dateTime('occurrence');
            $table->string('media')->nullable();
            $table->string('impact');
            $table->string('urgency');
            $table->text('room');
            $table->text('description');
            $table->string('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proctor_requests');
    }
};
