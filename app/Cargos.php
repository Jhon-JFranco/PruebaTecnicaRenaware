<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Cargos extends Model
{
    //
    protected $table='cargos';
    protected $primaryKey='id_cargo';
    public $timestamps=false;

    protected $fillable=[
        'descripcion_cargo',
        'salario'
    ];

    protected $guarded=[

    ];
}
