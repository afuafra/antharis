<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFidpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fidps', function (Blueprint $table) {
            $table->id();
            $table->string("fidp_no");
            $table->string("fidp_device_id")->unique();
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
        Schema::dropIfExists('fidps');
    }
}
