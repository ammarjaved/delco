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
    Schema::create('project_material', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('material_id');
        $table->integer('quantity');
        $table->string('created_by');
        $table->timestamps();

        $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_selections');
    }
};
