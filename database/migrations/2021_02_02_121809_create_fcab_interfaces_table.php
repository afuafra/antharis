<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcabInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcab_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('terminal_side');
            $table->string('port');
            $table->unsignedBigInteger('fcab_id');
            $table->foreign('fcab_id')->references('id')->on('fcabs');
            $table->unsignedBigInteger('fcab_splitter_interfaces_id');
            $table->foreign('fcab_splitter_interfaces_id')->references('id')->on('fcab_splitter_interfaces');
            $table->unsignedBigInteger('fcab_splitter_device_id');
            $table->foreign('fcab_splitter_device_id')->references('id')->on('fcab_splitters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fcab_interfaces');
    }
}
