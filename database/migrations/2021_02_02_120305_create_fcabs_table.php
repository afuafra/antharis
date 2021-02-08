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
            $table->string("fcab_device_id");
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
        Schema::dropIfExists('fcabs');
    }
}
