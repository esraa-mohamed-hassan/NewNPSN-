<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recording_scenarios', function (Blueprint $table) {
            $table->id();
            $table->string('event_type');
            $table->longText('goal_achieved');
            $table->longText('urgent_actions');
            $table->longText('creating_management_team');
            $table->longText('information_required');
            $table->longText('decision');
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
        Schema::dropIfExists('recording_scenarios');
    }
}
