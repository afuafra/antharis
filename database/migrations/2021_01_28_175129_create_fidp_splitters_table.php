<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFidpSplittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fidp_splitters', function (Blueprint $table) {
            $table->id();
            $table->string("fidp_splitter_no");
            $table->unsignedBigInteger('fidp_id');
            $table->foreign('fidp_id')->references('id')->on('fidps');
            $table->string("fidp_splitter_device_id")->unique();
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
        Schema::dropIfExists('fidp_splitters');
    }
}
