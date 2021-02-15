<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdpSplittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fdp_splitters', function (Blueprint $table) {
            $table->id();
            $table->string("fdp_splitter_no");
            $table->unsignedBigInteger('fdp_id');
            $table->foreign('fdp_id')->references('id')->on('fdps');
            $table->string("fdp_splitter_device_id");
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
        Schema::dropIfExists('fdp_splitters');
    }
}
