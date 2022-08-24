<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTab4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab4s', function (Blueprint $table) {
            $table->id();
            $table->string('size')->nullable();
            $table->string('figure')->nullable();
            $table->string('hockey')->nullable();
            $table->string('quote_id');
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
        Schema::dropIfExists('tab4s');
    }
}
