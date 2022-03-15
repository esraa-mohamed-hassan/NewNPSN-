<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DalilDestinationsEntitiesSubDestinationsEntities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dalil_destinations_entities_sub_destinations_entities', function (Blueprint $table) {
            $table->id();
            $table->integer('dalil_destinations_entities_id')->unsigned();
            $table->integer('sub_destinations_entities_id')->unsigned();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dalil_destinations_entities_sub_destinations_entities');
    }
}
