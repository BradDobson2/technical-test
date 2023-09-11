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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turbine_id')->constrained();
            $table->foreignId('component_type_id')->constrained();
            $table->string('serial_number');
            $table->timestamps();

            $table->unique(['turbine_id', 'serial_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('components', function (Blueprint $table) {
            $table->dropForeign(['turbine_id']);
            $table->dropForeign(['component_type_id']);
        });

        Schema::dropIfExists('components');
    }
};
