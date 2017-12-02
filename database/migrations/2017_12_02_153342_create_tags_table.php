<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
        });

        Schema::create('article_tag', function (Blueprint $table) {
            $table->integer('article_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_tag', function (Blueprint $table){
            $table->dropForeign(['article_id']);
            $table->dropForeign(['tag_id']);

            $table->dropIndex(['article_id']);
            $table->dropIndex(['tag_id']);
        });
        Schema::dropIfExists('article_tag');

        Schema::dropIfExists('tags');
    }
}
