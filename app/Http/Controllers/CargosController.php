<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cargos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CargosFormrequest;
use App\Http\Requests\CargosUpdateFormRequest;
use DB; 

class CargosController extends Controller
{
    //definicion de funciones
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $cargos=Cargos::orderBy('id_cargo','DESC')->paginate();
        return view('cargos.list',compact('cargos'));
    }

    public function create()
    {
         return view("cargos.create");
    }

    public function store(CargosFormrequest $request)
    {
        $cargos= new Cargos;
        $cargos->descripcion_cargo=$request->input('descripcion_cargo');
        $cargos->salario=$request->input('salario');
        $cargos->save();
        return Redirect::to('cargos');
    }

    public function show($id)
    {
        return view ("cargos.show",["cargos"=>Cargos::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view ("cargos.edit",["cargos"=>Cargos::findOrFail($id)]);
    }

    public function update(CargosUpdateFormRequest $request,$id)
    {
        $cargos=Cargos::findOrFail($id);
        $cargos->descripcion_cargo=$request->get('descripcion_cargo');
        $cargos->salario=$request->get('salario');
        $cargos->update();
        return Redirect::to('cargos');
    }

    public function destroy($id){
        $cargos = Cargos::findOrFail($id);
        $cargos->condicion='0';
        $cargos->delete();
        return Redirect::to('cargos');
    }

}
