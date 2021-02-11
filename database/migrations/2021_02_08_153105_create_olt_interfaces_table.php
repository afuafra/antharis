<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOltInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olt_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('olt_frame');
            $table->string('olt_card');
            $table->string('olt_port');
            $table->unsignedBigInteger('odf_interfaces_id')->nullable();
            $table->foreign('odf_interfaces_id')->references('id')->on('odf_interfaces');
            $table->foreign('olts_id')->references('id')->on('olts');
            $table->unsignedBigInteger('olts_id');
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
        Schema::dropIfExists('olt_interfaces');
    }
}
