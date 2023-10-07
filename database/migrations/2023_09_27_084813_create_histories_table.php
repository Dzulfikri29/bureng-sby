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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->text('header');
            $table->text('body');
            $table->unsignedBigInteger('first_gallery_id');
            $table->foreign('first_gallery_id')->references('id')->on('galleries')->constrained()->onDelete('restrict');
            $table->unsignedBigInteger('second_gallery_id');
            $table->foreign('second_gallery_id')->references('id')->on('galleries')->constrained()->onDelete('restrict');
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
        Schema::dropIfExists('histories');
    }
};
