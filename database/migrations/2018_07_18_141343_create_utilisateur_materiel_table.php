<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateurMaterielTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur_materiel', function(Blueprint $table) {
            $table->increments('id');
            $table->string('start_affectation');
            $table->string('end_affectation')->nullable();
            $table->integer('utilisateur_id')->unsigned();
            $table->integer('materiel_id')->unsigned();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateur_materiel');
    }
}
