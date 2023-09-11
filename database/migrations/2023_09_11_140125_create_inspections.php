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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turbine_id')->constrained();
            $table->string('inspector_name');
            $table->date('inspection_date');
            $table->timestamps();

            $table->unique(['turbine_id', 'inspector_name', 'inspection_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspections', function (Blueprint $table) {
            $table->dropForeign(['turbine_id']);
        });

        Schema::dropIfExists('inspections');
    }
};
