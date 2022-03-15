<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDalilPhonesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dalil_phones_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->foreign('entity_id')->references('id')->on('dalil_destinations_entities')->onDelete('cascade');
            $table->unsignedBigInteger('sub_entity_id')->nullable();
            $table->foreign('sub_entity_id')->references('id')->on('sub_destinations_entities')->onDelete('cascade');
            $table->string('name');
            $table->string('job');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
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
        Schema::dropIfExists('dalil_phones_lists');
    }
}
