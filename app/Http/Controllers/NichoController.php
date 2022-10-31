<?php

namespace App\Http\Controllers;

use App\Models\Difunto;
use App\Models\Familiar;
use App\Models\nicho;
use App\Models\Pabellon;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NichoController extends Controller
{
    private $validar = [
        'codigo' => 'required | numeric',
        'precio' => 'required',
    ];

    private $validarFamiliar = [
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required | numeric | min:8',
        'direccion' => 'required',
    ];

    public function index()
    {
        $pabellons = Pabellon::all();
        $nichos = nicho::orderBy('codigo')->get();
        return view('admin.nichos.index')->with(compact('pabellons', 'nichos'));
    }

    public function editEstado($id)
    {
        $nichoEstado = nicho::find($id);
        return response()->json([
            'status'=>200,
            'nichoEstado'=>$nichoEstado,
        ]);
    }

    public function updateEstado(Request $request)
    {
        $id_dif = $request->input('id_difunto');
        $difunto =  nicho::find($id_dif);
        $difunto->nombre = $request->input('nombre');
        $difunto->apellido = $request->input('apellido');
        $difunto->CI = $request->input('ci');
        $difunto->fecha_nacimiento = $request->input('fecha_nacimiento');
        $difunto->fecha_muerte = $request->input('fecha_muerte');
        $difunto->causa_muerte = $request->input('causa_muerte');
        $difunto->update();
        return redirect()->back();
    }

    public function edit($id)
    {
        $nichoReserva = nicho::find($id);
        return response()->json([
            'status' => 200,
            'nichoReserva' => $nichoReserva,
        ]);
    }

    public function nichoEdit($id)
    {
        $nichoEdit = nicho::find($id);
        return response()->json([
            'status' => 200,
            'nichoEdit' => $nichoEdit,
        ]);
    }


    public function update(Request $request)
    {
        $msg='Se actualizo correctamente';
        $request->validate($this->validar);
        $id_nic = $request->input('id_nicho');
        $nicho =  nicho::find($id_nic);
        $nicho->codigo = $request->input('codigo');
        $nicho->precio = $request->input('precio');
        $nicho->update();
        
   		Session::flash('msg', $msg);
        return redirect()->back();
    }

    public function nichoReserva($id)
    {
        $nichoEstado = nicho::find($id);
        return response()->json([
            'status'=>200,
            'nichoEstado'=>$nichoEstado,
        ]);
    }

    public function addReserva(Request $request)
    {
        $id_familiar_reserva = 0;
        if ($request->nombre == null ) {
            $user_id_familiar = Familiar::where('user_id', auth()->user()->id )->get();
            foreach ($user_id_familiar as $value) {
                $id_familiar_reserva = $value->id;
            }
            
        } else {
            $request->validate($this->validarFamiliar);
            $reserva_familiar = new Familiar();
            $reserva_familiar->nombre = $request->nombre;
            $reserva_familiar->apellido = $request->apellido;
            $reserva_familiar->CI = $request->ci;
            $reserva_familiar->email = auth()->user()->email;
            $reserva_familiar->telefono = $request->telefono;
            $reserva_familiar->direccion = $request->direccion;
            $reserva_familiar->user_id = auth()->user()->id;
            $reserva_familiar->save();
            $id_familiar_reserva = 1;
        }
        
        $difunto = new Difunto();
        $difunto->reserva = true;
        $difunto->save();


        $numRand = rand(1,99);
        $servicio = new Servicio();
        $servicio->codigo = "Re-$numRand";
        $servicio->difunto_id = $difunto->id;
        $servicio->familiar_id = $id_familiar_reserva;
        $nicho = nicho::find($request->id_nicho_reserva);
        $nicho->estado = "R";
        $nicho->update();
        $servicio->nicho_id = $request->id_nicho_reserva;
        $servicio->sector_id = 2;
        $servicio->estado = 'R';
        $servicio->precio = $request->precio;
        $servicio->descripcion = "Servicio en Reserva";
        $servicio->fecha_registro = date('Y-m-d H:i:s');
        $servicio->save();

        return redirect('/');
    }

}
