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
        Schema::create('rooms', function (Blueprint $table) {
            $table->string('roomNumber')->primary();
            $table->string('block');
           
            $table->integer('capacity');
            $table->boolean('locker')->nullable();
            $table->integer('lockerNumber')->nullable();
            $table->boolean('table')->nullable();
            $table->integer('tableNumber')->nullable();
            $table->boolean('chair')->nullable();
            $table->integer('chairNumber')->nullable();
            $table->boolean('light')->nullable();
            $table->integer('lightNumber')->nullable();
            $table->boolean('charger')->nullable();
            $table->integer('chargerNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
