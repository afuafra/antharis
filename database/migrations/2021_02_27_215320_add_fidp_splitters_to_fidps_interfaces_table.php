<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFidpSplittersToFidpsInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fidps_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fidp_splitters_id')->nullable();
            $table->foreign('fidp_splitters_id')->references('id')->on('fidp_splitters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fidps_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fidp_splitters_id')->nullable();
            $table->foreign('fidp_splitters_id')->references('id')->on('fidp_splitters');
        });
    }
}
