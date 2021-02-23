<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdpsInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdps_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('terminal_side');
            $table->string('port');
            $table->unsignedBigInteger('fcab_interface_id')->nullable();
            $table->foreign('fcab_interface_id')->references('id')->on('fcab_interfaces');
            $table->unsignedBigInteger('fdp_id');
            $table->foreign('fdp_id')->references('id')->on('fdps');
            $table->string('entity_id')->unique();
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
        Schema::dropIfExists('fdps_interfaces');
    }
}
