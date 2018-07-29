<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function(Blueprint $table) {
            $table->increments('id');
            $table->string('serial')->unique();
            $table->string('description')->nullable();
            $table->string('duree_guarantie');
            $table->string('date_acquisition');
			$table->integer('type_id')->unsigned();
			$table->integer('fournisseur_id')->unsigned();
			$table->integer('reforme_id')->nullable()->unsigned();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiels');
    }
}
