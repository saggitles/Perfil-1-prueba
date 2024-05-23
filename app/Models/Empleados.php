<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cargo',
        'salario',
        'departamento_id',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamentos::class);
    }
}
