<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\Difunto;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlmacenController extends Controller
{
    public function index(Request $res)
    {
    	$query = $res->input('query');
        $almacens = Almacen::orderBy('fecha')->where('fecha', 'like', "%$query%")->paginate(10);
        return view('admin.almacen.index')->with(compact('almacens'));
    }

    public function create()
    {
        $fecha_hoy = date('Y-m-d');
        $servicio = Servicio::all();//where('fecha_limite' >= $fecha_hoy)->get();
        return view('admin.almacen.create')->with(compact('servicio'));
    }

    public function store(Request $request)
    {

        $pers = new Almacen();
        $pers->servicio_id = $request->servicio_id;
        $pers->fecha = $request->fecha;
        $pers->save();
        return redirect('/admin/almacen');
    }

    public function incinerar(Request $request, $id)
    {
        $msg='Se incinero al difunto';
      
        $alm = Almacen::find($id);
        $alm->estado = "I";
        $alm->update();

        
        $dif = Servicio::find($request->id_servicio);
        $dif->estado = "I";
        $dif->update();
        
        $dif = Difunto::find($request->id_difunto);
        $dif->estado = "I";
        $dif->update();

   		Session::flash('msg', $msg);
   		return back();
    }
}
