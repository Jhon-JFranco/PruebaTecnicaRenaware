<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Salario_empleado;
use App\Empleados;
use App\Cargos;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Salario_empleadoFormrequest;
use DB;

class Salario_empleadoController extends Controller
{
    //
     //definicion de funciones
     public function __construct()
     {
     }
 
     public function index(Request $request)
     {
         if ($request) {
             $query = trim($request->get('searchText'));
             $salario_empleado = DB::table('salario_empleado')
             ->join('cargos', 'cargos.id_cargo', 'salario_empleado.id_cargo')
             ->join('empleados', 'empleados.id_empleado', 'salario_empleado.id_empleado')
             ->select('salario_empleado.*', 'cargos.descripcion_cargo', 'cargos.salario', 'empleados.nombre_empleado')
 
             ->paginate(10);
 
             return view('salario_empleado.list', ['salario_empleado' => $salario_empleado, 'searchText' => $query]);
         }
     }

     public function create()
     {
         $cargos = Cargos::all();
         $empleados = Empleados::all();

         return view('salario_empleado.create', compact('cargos', 'empleados'));
     }

     public function store(Salario_empleadoFormrequest $request)
     {
         $salario_empleado = new Salario_empleado();
         $salario_empleado->id_cargo = $request->get('id_cargo');
         $salario_empleado->id_empleado = $request->get('id_empleado');
         $salario_empleado->salario = $request->get('salario');
         $salario_empleado->impuestos = $request->get('impuestos');
         $salario_empleado->salud = $request->get('salud');
         $salario_empleado->pension = $request->get('pension');
         $salario_empleado->valor_primas = $request->get('valor_primas');
         $salario_empleado->save();
 
         return Redirect::to('salario_empleado');
     }

     public function show($id)
    {
        return view('salario_empleado.show', ['salario_empleado' => Salario_empleado::findOrFail($id)]);
    }
}
