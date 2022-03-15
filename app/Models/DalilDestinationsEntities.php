<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DalilPhonesList;
use App\Models\SubDestinationsEntities;


class DalilDestinationsEntities extends Model
{
    use HasFactory;
    protected $table = 'dalil_destinations_entities';
    protected $fillable = [
        'entity', 'sub_entity_id'
    ];

    public function phones(){
        return $this->hasMany(DalilPhonesList::class);
    }

    public function subEntities(){
        return $this->belongsToMany(SubDestinationsEntities::class);
    }

}
