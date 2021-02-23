<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFidpsInterfaceIdToFidpSplitterInterfaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fidp_splitter_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fidps_interface_id')->nullable();
            $table->foreign('fidps_interface_id')->references('id')->on('fidps_interfaces');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fidp_splitter_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fidps_interface_id')->nullable();
            $table->foreign('fidps_interface_id')->references('id')->on('fidps_interfaces');
        });
    }
}
