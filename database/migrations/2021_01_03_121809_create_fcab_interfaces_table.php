<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcabInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcab_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('terminal_side');
            $table->string('port');
            $table->unsignedBigInteger('odf_interfaces_id')->nullable();
            $table->foreign('odf_interfaces_id')->references('id')->on('odf_interfaces');
            $table->unsignedBigInteger('fcab_id');
            $table->foreign('fcab_id')->references('id')->on('fcabs');
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
        Schema::dropIfExists('fcab_interfaces');
    }
}
