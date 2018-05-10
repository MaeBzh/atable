<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetteCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recette_categorie', function (Blueprint $table) {
            $table->unsignedInteger('recette_id');
            $table->unsignedInteger('categorie_id');
            $table->timestamps();

            $table->foreign('recette_id')->references('id')->on('recettes');
            $table->foreign('categorie_id')->references('id')->on('categories');

            $table->primary(['recette_id', 'categorie_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recette_categories');
    }
}
