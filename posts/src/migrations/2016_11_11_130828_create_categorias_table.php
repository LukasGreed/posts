<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id_categoria');
            $table->string('nm_categoria', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id_post');
            $table->string('nm_titulo', 300);
            $table->text('ds_conteudo');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('post_categoria', function (Blueprint $table) {
            $table->increments('id_post_categoria');
            $table->integer('id_post')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_post')->references('id_post')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('categorias');
    }

}
