<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencie extends Model
{
    use HasFactory;

    protected $table = 'dependencies';
    protected $fillable = [
        'id',
        'code',
        'level',
        'name',
        'name_short',
        'name_title',
        'responsible',
        'phone_responsible',
        'phone_dependencie',
        'email_dependencie',
        'ubigeo',
        'dependencie_id',
        'status'
    ];

    public function areas()
    {
        return $this->hasMany(Area::class, 'dependencia_id');
    }
}
