<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFcabSplitterInterfacesIdToFcabInterfaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fcab_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fcab_splitter_interfaces_id')->nullable();
            $table->foreign('fcab_splitter_interfaces_id')->references('id')->on('fcab_splitter_interfaces');
            $table->unsignedBigInteger('fcab_splitter_device_id')->nullable();
            $table->foreign('fcab_splitter_device_id')->references('id')->on('fcab_splitters');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fcab_interfaces', function (Blueprint $table) {

            $table->unsignedBigInteger('fcab_splitter_interfaces_id')->nullable();
            $table->foreign('fcab_splitter_interfaces_id')->references('id')->on('fcab_splitter_interfaces');
            $table->unsignedBigInteger('fcab_splitter_device_id')->nullable();
            $table->foreign('fcab_splitter_device_id')->references('id')->on('fcab_splitters');

        });
    }
}
