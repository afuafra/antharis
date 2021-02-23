<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcabs', function (Blueprint $table) {
            $table->id();
            $table->string("fcab_no");
            $table->string("fcab_device_id")->unique();
            $table->string("device_address");
            $table->string("device_status");
            $table->foreign('device_site_id')->references('id')->on('device_sites');
            $table->unsignedBigInteger('device_site_id');
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
        Schema::dropIfExists('fcabs');
    }
}
