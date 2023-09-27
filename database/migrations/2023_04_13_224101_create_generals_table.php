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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->text('meta_description');
            $table->text('meta_image');
            $table->text('meta_keywords');
            $table->string('phone');
            $table->string('email');
            $table->text('logo');
            $table->text('logo_short');
            $table->text('logo_white');
            $table->text('logo_short_white');
            $table->text('address')->nullable();
            $table->text('tagline')->nullable();
            $table->text('browser_logo');
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
        Schema::dropIfExists('generals');
    }
};
