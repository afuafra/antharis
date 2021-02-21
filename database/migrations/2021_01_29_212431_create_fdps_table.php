<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdps', function (Blueprint $table) {
            $table->id();
            $table->string("fdp_no");
            $table->string("fdp_device_id")->unique();
            $table->string("device_address");
            $table->string("device_type");
            $table->string("device_status");
            $table->foreign('devicesites_id')->references('id')->on('devicesites');
            $table->unsignedBigInteger('devicesites_id');
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
        Schema::dropIfExists('fdps');
    }
}
