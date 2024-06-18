<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateAnnouncementsTable extends Migration
{
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id('postId');
            $table->string('title');
            $table->text('content');
            $table->string('type');
            $table->string('attachment')->nullable();
            $table->string('staffid'); // Use string data type for staffid column
            $table->timestamps();
    
            // Add foreign key constraint
            $table->foreign('staffid')->references('staffid')->on('staffs')->onDelete('cascade');
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
