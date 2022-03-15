<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypicalReportsPlaces extends Model
{
    use HasFactory;
    protected $table = 'typical_reports_places';
    protected $fillable = [
        'gathering_type','address','phone','carry_capacity','no_roles','building_area',
    ];
}
