<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypicalReportsPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typical_reports_places', function (Blueprint $table) {
            $table->id();
            $table->string('gathering_type');
            $table->string('address');
            $table->string('phone');
            $table->string('carry_capacity');
            $table->integer('no_roles');
            $table->integer('building_area');
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
        Schema::dropIfExists('typical_reports_places');
    }
}
