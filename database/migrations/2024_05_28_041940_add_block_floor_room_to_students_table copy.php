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
        Schema::table('students', function (Blueprint $table) {
            $table->string('block')->nullable();
            $table->unsignedBigInteger('floor')->nullable();
            $table->unsignedBigInteger('room')->nullable();

            // Add foreign key constraints if necessary
            $table->foreign('block')->references('blockName')->on('blocks');
            // $table->foreign('floor_id')->references('id')->on('floors');
            $table->foreign('room')->references('roomNumber')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('block');
            $table->dropColumn('floor');
            $table->dropColumn('room');
        });
    }
};
