<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('church_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('available_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('date')->nullable();
            $table->text('url')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('street',100)->nullable();
            $table->string('number',20)->nullable();
            $table->string('complement',100)->nullable();
            $table->string('neighborhood',100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('zipcode',10)->nullable();
            $table->text('comment')->nullable();
            $table->integer('status')->default(1);
            $table->float('price')->nullable();
            $table->float('price_church')->nullable(0);
            $table->float('discount')->nullable(0);
            $table->integer('kits')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
