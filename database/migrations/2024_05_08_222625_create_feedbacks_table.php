<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->text('comment');
            $table->timestamps();
    
            $table->foreign('student_id')->references('studentid')->on('students')->onDelete('cascade');
        });
        
        
    }

    
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};