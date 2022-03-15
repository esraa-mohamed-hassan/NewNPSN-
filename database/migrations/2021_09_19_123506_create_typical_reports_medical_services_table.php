<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypicalReportsMedicalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typical_reports_medical_services', function (Blueprint $table) {
            $table->id();
            $table->string('hospital');
            $table->string('address');
            $table->string('phone');
            $table->integer('no_doctors');
            $table->integer('no_beds');
            $table->integer('no_operating_rooms');
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
        Schema::dropIfExists('typical_reports_medical_services');
    }
}
