<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExplanationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('explanations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ojt_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('secular')->default(0);
            $table->integer('religion')->default(0);
            $table->integer('church')->default(0);
            $table->integer('witness')->default(0);
            $table->integer('diagnostic')->default(0);
            $table->integer('grace')->default(0);
            $table->integer('sin')->default(0);
            $table->integer('god')->default(0);
            $table->integer('christ')->default(0);
            $table->integer('faith')->default(0);
            $table->integer('qualifying')->default(0);
            $table->integer('commitment')->default(0);
            $table->integer('clarification')->default(0);
            $table->integer('prayer')->default(0);
            $table->integer('assurance')->default(0);
            $table->integer('bible')->default(0);
            $table->integer('pray')->default(0);
            $table->integer('praise')->default(0);
            $table->integer('fellowship')->default(0);
            $table->integer('testimony')->default(0);
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
        Schema::dropIfExists('explanations');
    }
}
