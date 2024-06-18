<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStaffIdToRoomMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_maintenances', function (Blueprint $table) {
            $table->string('staffid')->nullable();

            $table->foreign('staffid')
                ->references('staffid')
                ->on('staffs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_maintenances', function (Blueprint $table) {
            $table->dropForeign(['staffid']);
            $table->dropColumn('staffid');
        });
    }
}