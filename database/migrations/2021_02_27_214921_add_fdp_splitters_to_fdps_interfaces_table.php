<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFdpSplittersToFdpsInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fdps_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fdp_splitter_interfaces_id')->nullable();
            $table->foreign('fdp_splitter_interfaces_id')->references('id')->on('fdp_splitter_interfaces');
            $table->unsignedBigInteger('fdp_splitters_id')->nullable();
            $table->foreign('fdp_splitters_id')->references('id')->on('fdp_splitters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fdps_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fdp_splitter_interfaces_id')->nullable();
            $table->foreign('fdp_splitter_interfaces_id')->references('id')->on('fdp_splitter_interfaces');
            $table->unsignedBigInteger('fdp_splitters_id')->nullable();
            $table->foreign('fdp_splitters_id')->references('id')->on('fdp_splitters');
        });
    }
}
