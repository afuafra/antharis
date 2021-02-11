<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdfRacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odf_racks', function (Blueprint $table) {
            $table->id();
            $table->string("odf_rack_name");
            $table->string("odf_device_id");
            $table->string("device_address");
            $table->string("device_status");
            $table->foreign('devicesites_id')->references('id')->on('devicesites');
            $table->unsignedBigInteger('devicesites_id')->nullable();
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
        Schema::dropIfExists('odf_racks');
    }
}
