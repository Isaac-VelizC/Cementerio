<?php

namespace App\Http\Controllers;

use App\Models\Difunto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DifuntoController extends Controller
{
    private $validar = [
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nacimiento' => 'required',
        'fecha_muerte' => 'required',
        'causa_muerte' => 'required',
    ];

    public function index(Request $res)
    {
    	$query = $res->input('query');
        $difuntos = Difunto::orderBy('nombre')->where('nombre', 'like', "%$query%")->paginate(10);
        return view('admin.difuntos.index')->with(compact('difuntos'));
    }

    public function edit($id)
    {
        $difuntoEdit = Difunto::find($id);
        return response()->json([
            'status'=>200,
            'difuntoEdit'=>$difuntoEdit,
        ]);
    }

    public function update(Request $request)
    {
        $msg='Se actualizo correctamente';
        $request->validate($this->validar);
        $id_dif = $request->input('id_difunto');
        $difunto =  Difunto::find($id_dif);
        $difunto->nombre = $request->input('nombre');
        $difunto->apellido = $request->input('apellido');
        $difunto->difunto_ci = $request->input('difunto_ci');
        $difunto->fecha_nacimiento = $request->input('fecha_nacimiento');
        $difunto->fecha_muerte = $request->input('fecha_muerte');
        $difunto->causa_muerte = $request->input('causa_muerte');
        $difunto->update();
        
   		Session::flash('msg', $msg);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $msg='Se envio al difunto al almacen';
      
        $per = Difunto::find($id);
        $per->estado = "A";
        $per->update();

   		Session::flash('msg', $msg);
   		return back();
    }
}
