<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DalilDestinationsEntities;
use App\Models\SubDestinationsEntities;


class DalilPhonesList extends Model
{
    use HasFactory;
    protected $table = 'dalil_phones_lists';
    protected $fillable = [
        'entity_id','sub_entity_id','name','job','phone','mobile','fax',
    ];

    public function entities(){
        return $this->belongsTo(DalilDestinationsEntities::class, 'entity_id');
    }

    public function subEntities(){
        return $this->belongsTo(SubDestinationsEntities::class, 'sub_entity_id');
    }
}
