<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apresentations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('who')->nullable();
            $table->text('ministery')->nullable();
            $table->text('todo')->nullable();
            $table->text('other')->nullable();
            $table->text('photo_who')->nullable();
            $table->string('photo_ministery')->nullable();
            $table->string('photo_todo')->nullable();
            $table->string('photo_other')->nullable();
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
        Schema::dropIfExists('apresentations');
    }
}
