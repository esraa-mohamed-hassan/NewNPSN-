<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingEventDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recording_event_data', function (Blueprint $table) {
            $table->id();
            $table->string('event_type');
            $table->string('entity_type');
            $table->date('date');
            $table->text('time');
            $table->longText('special_entity');
            $table->longText('event');
            $table->longText('procedures');
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
        Schema::dropIfExists('recording_event_data');
    }
}
