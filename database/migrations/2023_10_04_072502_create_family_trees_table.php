<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_trees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id')->references('id')->on('families')->onDelete('restrict');
            $table->unsignedBigInteger('family_tree_id')->nullable();
            $table->foreign('family_tree_id')->references('id')->on('family_trees')->onDelete('restrict');
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->string('place_of_death')->nullable();
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
        Schema::dropIfExists('family_trees');
    }
};
