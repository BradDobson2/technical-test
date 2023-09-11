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
        Schema::create('turbines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wind_farm_id')->constrained();
            $table->string('name');
            $table->point('location');
            $table->timestamps();

            $table->unique(['wind_farm_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turbines', function (Blueprint $table) {
            $table->dropForeign(['wind_farm_id']);
        });

        Schema::dropIfExists('turbines');
    }
};
