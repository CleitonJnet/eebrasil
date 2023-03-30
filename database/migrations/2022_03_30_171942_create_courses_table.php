<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->foreignId('ministry_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('execution')->nullable();
            $table->string('banner')->nullable();
            $table->string('certificate')->nullable();
            $table->string('logo')->nullable();
            $table->string('initial')->nullable();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->text('knowhow')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
