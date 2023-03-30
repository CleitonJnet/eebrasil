<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name',100)->nullable();
            $table->string('pastor',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('street',100)->nullable();
            $table->string('number',20)->nullable();
            $table->string('complement',100)->nullable();
            $table->string('neighborhood',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('zipcode',10)->nullable();
            $table->string('contact',100)->nullable();
            $table->string('contact_phone',20)->nullable();
            $table->string('contact_email',100)->nullable();
            $table->text('comment')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('churches');
    }
}
