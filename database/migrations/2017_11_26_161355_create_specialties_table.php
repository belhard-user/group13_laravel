<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('specialty_test', function (Blueprint $table) {
            $table->integer('test_id')->unsigned()->index();
            $table->integer('specialty_id')->unsigned()->index();

            $table->foreign('test_id')->references('id')->on('test')->onDelete('cascade');
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specialty_test', function(Blueprint $table){
            $table->dropForeign(['test_id']);
            $table->dropForeign(['specialty_id']);

            $table->dropIndex(['test_id']);
            $table->dropIndex(['specialty_id']);
        });
        Schema::dropIfExists('specialties');
        Schema::dropIfExists('specialty_test');
    }
}
