<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('photo')->nullable();
            $table->text('description');
            $table->unsignedInteger('recette_id');
            $table->timestamps();

            $table->foreign('recette_id')
                ->references('id')
                ->on('recettes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapes');
    }
}
