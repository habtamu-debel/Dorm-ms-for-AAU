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
        Schema::create('blocks', function (Blueprint $table) {
            $table->string('blockName')->primary()->unique();
            $table->integer('capacity');
            $table->integer('floor');
            $table->integer('numRooms');
            $table->boolean('light')->default(false);
            $table->integer('lightNumber')->nullable();
            $table->boolean('bathroom')->default(false);
            $table->integer('bathroomNumber')->nullable();
            $table->boolean('fireHydrant')->default(false);
            $table->integer('fireHydrantNumber')->nullable();
            $table->boolean('specialFacility')->default(false);
            $table->integer('specialFacilityNumber')->nullable();
            $table->boolean('toilet')->default(false);
            $table->integer('toiletNumber')->nullable();
            $table->boolean('mirror')->default(false);
            $table->integer('mirrorNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blocks');
    }
};
