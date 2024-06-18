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
        Schema::table('p_mannouncements', function (Blueprint $table) {
            $table->dropColumn('postId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('p_mannouncements', function (Blueprint $table) {
            $table->unsignedBigInteger('postId');
        });
    }
};
