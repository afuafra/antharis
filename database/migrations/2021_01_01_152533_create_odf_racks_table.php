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
            $table->string("odf_device_id")->unique();
            $table->string("device_address");
            $table->string("device_status");
            $table->foreign('device_sites_id')->references('id')->on('device_sites');
            $table->unsignedBigInteger('device_sites_id')->nullable();
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');
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
