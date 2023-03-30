<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('initial')->nullable();
            $table->string('name')->nullable();
            $table->string('population')->nullable();
            $table->string('protestantism')->nullable();
            $table->string('catholicism')->nullable();
            $table->string('atheism')->nullable();
            $table->string('geoViewBox')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->text('path')->nullable();
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
        Schema::dropIfExists('zones');
    }
}
