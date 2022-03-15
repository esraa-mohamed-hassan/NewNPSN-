<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportsOperationData extends Model
{
    use HasFactory;
    protected $table = 'reports_operation_data';
    protected $fillable = [
        'name','job','address','work_phone','phone',
    ];

}
