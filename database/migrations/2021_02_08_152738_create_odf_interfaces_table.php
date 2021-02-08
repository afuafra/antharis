<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdfInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odf_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('odf_no');
            $table->string('odf_port');
            $table->foreign('odf_racks_id')->references('id')->on('odf_racks');
            $table->unsignedBigInteger('odf_racks_id')->nullable();
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
        Schema::dropIfExists('odf_interfaces');
    }
}
