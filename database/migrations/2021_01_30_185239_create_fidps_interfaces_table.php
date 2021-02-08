<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFidpsInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fidps_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('terminal_side');
            $table->string('port');
            $table->unsignedBigInteger('fidp_id');
            $table->foreign('fidp_id')->references('id')->on('fidps');
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
        Schema::dropIfExists('fidps_interfaces');
    }
}
