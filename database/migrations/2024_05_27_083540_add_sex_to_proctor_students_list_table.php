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
        Schema::table('proctor_students_list', function (Blueprint $table) {
            $table->char('sex', 1)->nullable()->after('year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proctor_students_list', function (Blueprint $table) {
            $table->dropColumn('sex');
        });
    }
};
