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
    Schema::create('maintenance_requests', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('clearance_id')->nullable();
        $table->string('requester_name');
        $table->string('department');
        $table->text('issue_description');
        $table->string('supporting_documents')->nullable();
        $table->string('contact_details');
        $table->timestamps();

        $table->foreign('clearance_id')->references('id')->on('clearances')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');
    }
};
