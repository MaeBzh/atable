<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecetteDuJourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recette_du_jour', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recette_id');
            $table->date("date");
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
        Schema::dropIfExists('recette_du_jour');
    }
}
