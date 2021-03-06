<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('nb_pers');
            $table->string('photo');
            $table->enum('prix', ['bon marché', 'moyen', 'cher']);
            $table->enum('difficulte', ['facile', 'moyen', 'difficile']);
            $table->time('temps_cuisson');
            $table->time('temps_preparation');
            $table->text('conseil_presentation')->nullable();

            $table->unsignedInteger('auteur_id');
            $table->foreign('auteur_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('categorie_id');
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict');

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
        Schema::dropIfExists('recettes');
    }
}
