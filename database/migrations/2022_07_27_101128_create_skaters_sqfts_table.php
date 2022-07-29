<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkatersSqftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skaters_sqfts', function (Blueprint $table) {
            $table->id();
            $table->string('sqfts_id');
            $table->string('ofskaterssqfts');
            $table->string('ofrentalskatersneeded');
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
        Schema::dropIfExists('skaters_sqfts');
    }
}
