<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DalilDestinationsEntities;
use App\Models\DalilPhonesList;

class SubDestinationsEntities extends Model
{
    use HasFactory;

    protected $table = 'sub_destinations_entities';
    protected $fillable = [
        'name',
    ];

    public function phones(){
        return $this->hasMany(DalilPhonesList::class);
    }
    public function entities(){
        return $this->belongsToMany(DalilDestinationsEntities::class);
    }
}
