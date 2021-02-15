<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdpSplitterInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdp_splitter_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('port');
            $table->unsignedBigInteger('fdp_splitter_id');
            $table->foreign('fdp_splitter_id')->references('id')->on('fdp_splitters');
            $table->unsignedBigInteger('fdps_interface_id')->nullable();
            $table->foreign('fdps_interface_id')->references('id')->on('fdps_interfaces');
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
        Schema::dropIfExists('fdp_splitter_interfaces');
    }
}
