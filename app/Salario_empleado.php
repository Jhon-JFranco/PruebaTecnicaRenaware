<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Salario_empleado extends Model
{
    //
    protected $table='salario_empleado';
    protected $primaryKey='id_salario_empleado';
    public $timestamps=false;

    protected $fillable=[
        
        'id_empleado',
        'salario',
        'impuestos',
        'salud',
        'pension',
        'valor_primas',
        'id_cargo'
    ];

    protected $guarded=[

    ];
}
