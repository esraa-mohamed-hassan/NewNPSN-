<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordingIncomingReports extends Model
{
    use HasFactory;
    protected $table = 'recording_incoming_reports';
    protected $fillable = [
        'date', 'time', 'subject', 'procedures_npsn', 'procedures_authorities', 'result', 'entity'
    ];
}
