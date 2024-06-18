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
        Schema::create('lost_and_found', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->index(); // Foreign key for 'accounts' table
            $table->string('item_status')->index(); // 'found' or 'lost'
            $table->string('item_name');
            $table->string('location_found');
            $table->date('date_found');
            $table->text('additional_details')->nullable();
            $table->string('claimant_contact');
            $table->string('photo')->nullable();
            $table->timestamps();
    
            $table->foreign('student_id')
                  ->references('student_id')
                  ->on('accounts')
                  ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_and_found');
    }
};
