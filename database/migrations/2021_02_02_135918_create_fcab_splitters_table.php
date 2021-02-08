<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcabSplittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcab_splitters', function (Blueprint $table) {
            $table->id();
            $table->string("fcab_splitter_no");
            $table->unsignedBigInteger('fcab_id');
            $table->foreign('fcab_id')->references('id')->on('fcabs');
            $table->string("fcab_splitter_device_id");
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
        Schema::dropIfExists('fcab_splitters');
    }
}
