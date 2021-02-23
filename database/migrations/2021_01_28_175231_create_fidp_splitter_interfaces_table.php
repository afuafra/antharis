<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFidpSplitterInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fidp_splitter_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('port');
            $table->unsignedBigInteger('fidp_splitter_id');
            $table->foreign('fidp_splitter_id')->references('id')->on('fidp_splitters');
//
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
        Schema::dropIfExists('fidp_splitter_interfaces');
    }
}
