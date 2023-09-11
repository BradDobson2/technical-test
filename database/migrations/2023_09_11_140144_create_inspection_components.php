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
        Schema::create('inspection_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspection_id')->constrained();
            $table->foreignId('component_id')->constrained();
            $table->foreignId('component_grade_id')->constrained();
            $table->string('image_url');
            $table->timestamps();

            $table->unique(['inspection_id', 'component_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspection_components', function (Blueprint $table) {
            $table->dropForeign(['inspection_id']);
            $table->dropForeign(['component_id']);
            $table->dropForeign(['component_grade_id']);
        });

        Schema::dropIfExists('inspection_components');
    }
};
