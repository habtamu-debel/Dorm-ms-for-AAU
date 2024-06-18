<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('item_status'); // Add item_status column
            $table->string('item_name'); // Add item_name column
            $table->string('location_found'); // Add location_found column
            $table->date('date_found'); // Add date_found column
            $table->text('additional_details'); // Add additional_details column
            $table->timestamps();

            // Define foreign key constraint if needed
            // $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}