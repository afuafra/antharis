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
            $table->string("fidp_device_id");
            $table->string("device_address");
            $table->string("device_status");
            $table->string("atollislandsite");
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
