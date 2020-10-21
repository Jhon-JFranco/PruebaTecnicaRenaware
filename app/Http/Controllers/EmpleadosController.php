<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Empleados;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpleadosFormrequest;
use App\Http\Requests\EmpleadosUpdateFormRequest;
use DB;

class EmpleadosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
     {
        $empleados=Empleados::orderBy('id_empleado','DESC')->paginate();
        return view('empleados.list',compact('empleados'));
     }

     public function create()
     {
          return view("empleados.create");
     }
 

    public function store(EmpleadosFormrequest $request)
    {
        $empleados= new Empleados;
        $empleados->numero_documento=$request->get('numero_documento');
        $empleados->nombre_empleado=$request->get('nombre_empleado');
        $empleados->apellido_empleado=$request->get('apellido_empleado');
        $empleados->telefono=$request->get('telefono');
        $empleados->direccion=$request->get('direccion');
        $empleados->estado=$request->get('estado');
        $empleados->save();
        return Redirect::to('empleados');
    }
 
    public function show($id)
    {
        return view ("empleados.show",["empleados"=>Empleados::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view ("empleados.edit",["empleados"=>Empleados::findOrFail($id)]);

    }

    public function update(EmpleadosUpdateFormRequest $request,$id)
    {
        $empleados=Empleados::findOrFail($id);
        $empleados->numero_documento=$request->get('numero_documento');
        $empleados->nombre_empleado=$request->get('nombre_empleado');
        $empleados->apellido_empleado=$request->get('apellido_empleado');
        $empleados->telefono=$request->get('telefono');
        $empleados->direccion=$request->get('direccion');
        $empleados->estado=$request->get('estado');
        $empleados->update();
        return Redirect::to('empleados');
    }



    public function destroy($id){
        $empleados = Empleados::findOrFail($id);
        $empleados->condicion='0';
        $empleados->delete();
        return Redirect::to('empleados');
    }

}
