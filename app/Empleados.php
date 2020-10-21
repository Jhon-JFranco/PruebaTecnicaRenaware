<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Empleados extends Model
{
    //
    protected $table='empleados';
    protected $primaryKey='id_empleado';
    public $timestamps=false;

    protected $fillable=[
        'numero_documento',
        'nombre_empleado',
        'apellido_empleado',
        'telefono',
        'direccion',
        'estado'
    ];

    protected $guarded=[

    ];
}


