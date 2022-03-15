<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordingScenarios extends Model
{
    use HasFactory;
    protected $table = 'recording_scenarios';
    protected $fillable = [
        'event_type', 'goal_achieved', 'urgent_actions', 'creating_management_team', 'information_required', 'decision'
    ];
}
