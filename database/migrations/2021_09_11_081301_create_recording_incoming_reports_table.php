<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingIncomingReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recording_incoming_reports', function (Blueprint $table) {
            $table->id();
            $table->string('entity');
            $table->date('date');
            $table->text('time');
            $table->longText('subject');
            $table->longText('procedures_npsn');
            $table->longText('procedures_authorities');
            $table->longText('result');
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
        Schema::dropIfExists('recording_incoming_reports');
    }
}
