<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRecetteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_recette', function (Blueprint $table) {
            $table->unsignedInteger('ingredient_id');
            $table->unsignedInteger('recette_id');
            $table->unsignedInteger('quantite');
            $table->enum('unite', ['l', 'cl', 'ml', 'kg', 'g', 'mg', 'cs', 'cc']);
            $table->timestamps();

            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');

            $table->foreign('recette_id')
                ->references('id')
                ->on('recettes')
                ->onDelete('cascade');

            $table->primary(['ingredient_id', 'recette_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_recettes');
    }
}
