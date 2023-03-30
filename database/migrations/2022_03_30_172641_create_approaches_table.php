<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApproachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approaches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ojt_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name',100)->nullable();
            $table->string('gender',1)->nullable();
            $table->date('birth')->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('street',100)->nullable();
            $table->string('number',20)->nullable();
            $table->string('complement',100)->nullable();
            $table->string('neighborhood',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('zipcode',10)->nullable();
            $table->integer('result')->nullable();
            $table->integer('growth')->nullable();
            $table->integer('discipleship')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('approaches');
    }
}
