<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'id',
        'code',
        'level',
        'name',
        'name_short',
        'name_title',
        'responsible',
        'phone_responsible',
        'phone_area',
        'email_area',
        'area_id',
        'status'
    ];

    public function dependencie()
    {
        return $this->belongsTo(Dependencie::class, 'dependencia_id');
    }
}
