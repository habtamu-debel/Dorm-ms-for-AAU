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
        Schema::table('manager_students_list', function (Blueprint $table) {
            $table->string('block')->nullable();
            $table->unsignedBigInteger('floor')->nullable();
            $table->unsignedBigInteger('room')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('manager_students_list', function (Blueprint $table) {
            $table->dropColumn('block');
            $table->dropColumn('floor');
            $table->dropColumn('room');
        });
    }
};
