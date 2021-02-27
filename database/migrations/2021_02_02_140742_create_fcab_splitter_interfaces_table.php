<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcabSplitterInterfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcab_splitter_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('port');
            $table->unsignedBigInteger('fcab_splitter_id');
            $table->foreign('fcab_splitter_id')->references('id')->on('fcab_splitters');
//            $table->unsignedBigInteger('fcab_interface_id')->nullable();
//            $table->foreign('fcab_interface_id')->references('id')->on('fcab_interfaces');
            $table->boolean('consumed')->default(0);
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
        Schema::dropIfExists('fcab_splitter_interfaces');
    }
}
