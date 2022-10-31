<?php

namespace App\Http\Controllers;

use App\Models\ciudad;
use App\Models\Difunto;
use App\Models\estado_civil;
use App\Models\Familiar;
use App\Models\provincia;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservaController extends Controller
{
    private $validar = [
        'nombre' => 'required',
        'apellido' => 'required',
        'fecha_nacimiento' => 'required',
        'civil_id' => 'required',
        'fecha_muerte' => 'required',
        'causa_muerte' => 'required',
    ];

    public function reservasCliente()
    {
        $idFamiliar = 0;
        $iduser = auth()->user()->id;
        $authCliente = Familiar::where('user_id', $iduser)->get();
        foreach ($authCliente as $value) {
            $idFamiliar = $value->nombre;
        }
        
        dd($authCliente);
        $reservasCliente = Servicio::where('estado', 'R')->get();
        return view('reservaLista')->with(compact('reservasCliente'));
    }

    public function index()
    {
        $reservas = Servicio::where('estado', 'R')->get();
        return view('admin.reserva.index')->with(compact('reservas'));
    }
    
    public function edit($id)
    {
        $civil = estado_civil::all();
        $ciudades = ciudad::all();
        $provincia = provincia::all();
        $servicio = Servicio::find($id);
        $editDifunto = Difunto::find($servicio->difunto_id);
        return view('admin.reserva.confirm')->with(compact('editDifunto','servicio', 'ciudades', 'provincia', 'civil'));
    }

    public function update(Request $request, $id)
    {
        $serv = Servicio::find($request->id_servicio);
        $serv->estado = 'A';
        $serv->fecha_limite = $request->fecha_limite;
        if ($request->estado_pago == "on") {
            $serv->estado_pago = true;
        }
        $serv->update();
        $msg='Reserva confirmada';
        $request->validate($this->validar);
        $pers =  Difunto::find($id);
        $pers->nombre = $request->nombre;
        $pers->apellido = $request->apellido;
        $pers->difunto_ci = $request->difunto_ci;
        $pers->civil_id = $request->civil_id;
        $pers->reserva = false;
        $pers->provincia_id = $request->provincia_id;
        $pers->causa_muerte = $request->causa_muerte;
        $pers->fecha_nacimiento = $request->fecha_nacimiento;
        $pers->fecha_muerte = $request->fecha_muerte;
        $pers->update();
        Session::flash('msg', $msg);
        return redirect('/admin/reserva');
    }
}
