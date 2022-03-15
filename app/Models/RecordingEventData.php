<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordingEventData extends Model
{
    use HasFactory;
    protected $table = 'recording_event_data';
    protected $fillable = [
        'date', 'time', 'event_type', 'entity_type', 'special_entity', 'event', 'procedures', 'result'
    ];
}
