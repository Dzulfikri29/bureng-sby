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
        Schema::table('family_trees', function (Blueprint $table) {
            $table->string('phone')->after('place_of_death')->nullable();
            $table->string('number')->after('phone')->nullable();
            $table->string('address')->after('number')->nullable();
            $table->string('map_link')->after('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('family_trees', function (Blueprint $table) {
            $table->dropColumn(['phone', 'number', 'address', 'map_link']);
        });
    }
};
