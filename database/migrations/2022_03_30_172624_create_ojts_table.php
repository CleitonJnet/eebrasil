<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOjtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ojts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('church_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('mentor_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('prospect',100)->nullable();
            $table->unsignedInteger('position')->default(0);
            $table->integer('type')->nullable();
            $table->string('indicated')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('gender')->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('street',100)->nullable();
            $table->string('number',20)->nullable();
            $table->string('complement',100)->nullable();
            $table->string('neighborhood',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('zipcode',10)->nullable();
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
        Schema::dropIfExists('ojts');
    }
}
