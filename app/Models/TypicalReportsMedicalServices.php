<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypicalReportsMedicalServices extends Model
{
    use HasFactory;
    protected $table = 'typical_reports_medical_services';
    protected $fillable = [
        'hospital','address','phone','no_doctors','no_beds','no_operating_rooms',
    ];
}
