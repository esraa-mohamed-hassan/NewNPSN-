<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportsEntities extends Model
{
    use HasFactory;

    protected $table = 'reports_entities';
    protected $fillable = [
        'entity_name',
    ];

}
