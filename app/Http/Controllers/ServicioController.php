<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\ciudad;
use App\Models\Difunto;
use App\Models\estado_civil;
use App\Models\Familiar;
use App\Models\nicho;
use App\Models\Pabellon;
use App\Models\provincia;
use App\Models\Sector;
use App\Models\Servicio;
use App\Models\Tumba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\If_;

class ServicioController extends Controller
{
    private $validar = [
        //difunto
        'difunto_nombre' => 'required',
        'difunto_apellido' => 'required',
        'difunto_ci' => ['required', 'string', 'max:10', 'unique:difuntos'],
        'civil_id' => 'required | numeric',
        'provincia_id' => 'required | numeric',
        'fecha_nacimiento' => 'required',
        'fecha_muerte' => 'required',
        'causa_muerte' => 'required',
        //servicio
        'sector_id' => 'required | numeric',
        'fecha_limite' => 'required',
        'precio' => 'required',
    ];

    private $validarFamiliar = [
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required | numeric | min:8',
        'direccion' => 'required',
    ];

    private $validarEdit = [
        'sector_id' => 'required | numeric',
        'precio' => 'required',
    ];

    public function index(Request $res)
    {
    	$query = $res->input('query');
        $servicios = Servicio::orderBy('fecha_registro')->where('fecha_registro', 'like', "%$query%")->paginate(10);
        return view('admin.servicios.index')->with(compact('servicios'));
    }

    public function provinciaDep($id)
    {
        $provinciaDep = provincia::where("ciudad_id", $id)->get();
        return response()->json([
            'status'=>200,
            'provinciaDep'=>$provinciaDep,
        ]);
    }

    public function create()
    {
        $familiar = Familiar::where('estado', 'A')->orderBy('nombre')->get();
        $difunto = Difunto::all();
        $sector = Sector::all();
        $pabellons = Pabellon::all();
        $nichos = nicho::all();
        $civil = estado_civil::all();
        $ciudades = ciudad::all();
        $provincia = provincia::all();
        return view('admin.servicios.create')->with(compact('sector', 'familiar', 'difunto', 'pabellons', 'nichos', 'ciudades', 'provincia', 'civil'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validar);
        $id_familiar_servicio = 0 ;
        if ($request->familiar_id == 0) {
            $msg='Debe seleccionar o registrar al familiar';
            if ($request->nombre == null || $request->apellido == null ) {
                Session::flash('msg', $msg);
                return back();
            } else {
                $request->validate($this->validarFamiliar);
                $familiar = new Familiar();
                $familiar->nombre = $request->nombre;
                $familiar->apellido = $request->apellido;
                $familiar->CI = $request->ci;
                $familiar->email = $request->email;
                $familiar->telefono = $request->telefono;
                $familiar->direccion = $request->direccion;
                $familiar->save();
                $id_familiar_servicio = $familiar->id;
            }
        } else {
            $id_familiar_servicio = $request->familiar_id;
        }

        $difunto = new Difunto();
        $difunto->nombre = $request->difunto_nombre;
        $difunto->apellido = $request->difunto_apellido;
        $difunto->difunto_ci = $request->difunto_ci;
        $difunto->civil_id = $request->civil_id;
        $difunto->provincia_id = $request->provincia_id;
        $difunto->fecha_nacimiento = $request->fecha_nacimiento;
        $difunto->fecha_muerte = $request->fecha_muerte;
        $difunto->causa_muerte = $request->causa_muerte;
        $difunto->save();
        
        $numRand = rand(1,99);
        $servicio = new Servicio();
        $servicio->codigo = "S$difunto->id$id_familiar_servicio-$numRand";
        $servicio->difunto_id = $difunto->id;
        $servicio->familiar_id = $id_familiar_servicio;
        if ($request->sector_id == 2) {    
            $nicho = nicho::find($request->id_nicho);
            $nicho->estado = "O";
            $nicho->update();
            $servicio->nicho_id = $request->id_nicho;
        }
        $servicio->sector_id = $request->sector_id;
        $servicio->precio = $request->precio;
        if ($request->descripcion == null) {
            $servicio->descripcion = "No hay descripcion";
        } else {
            $servicio->descripcion = $request->descripcion;
        }
        if ($request->estado_pago == "on") {
            $servicio->estado_pago = true;
        }
        $servicio->fecha_registro = date('Y-m-d H:i:s');
        $servicio->fecha_limite = $request->fecha_limite;
        $servicio->save();

        return redirect('/admin/servicios');
    }

    public function show($id)
    {
        $servicioShow = Servicio::find($id);
        return view('admin.servicios.show')->with(compact('servicioShow'));
    }
    
    public function edit($id)
    {
        $sector = Sector::all();
        $nichos = nicho::all();
        $servicioEdit = Servicio::find($id);
        return view('admin.servicios.edit')->with(compact('servicioEdit','sector', 'nichos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validarEdit);
        $servicio = Servicio::find($id);
        if ($request->sector_id == 2) {    
            $nicho = nicho::find($request->id_nicho);
            $nicho->estado = "O";
            $nicho->update();
            $servicio->nicho_id = $request->id_nicho;
        }
        $servicio->sector_id = $request->sector_id;
        $servicio->precio = $request->precio;

        if ($request->descripcion == null) {
            $servicio->descripcion = "No hay descripcion";
        } else {
            $servicio->descripcion = $request->descripcion;
        }
        if ($request->estado_pago == "on") {
            $servicio->estado_pago = true;
        }
        if ($request->fecha_limite == null) {
            $servicio->fecha_limite = $servicio->fecha_limite;
        } else {
            $servicio->fecha_limite = $request->fecha_limite;
        }
        
        $servicio->update();

        return redirect('/admin/servicios');
    }

    public function reserva()
    {
        $id_usuario = Familiar::Where('user_id', auth()->user()->id);
        $id_usuario = $id_usuario->count();
        $nichos = nicho::all();
        return view('reserva')->with(compact('nichos', 'id_usuario'));
    }

    public function Renovacion(Request $request, $id)
    {
        $renovacion = Servicio::find($id);
        return view('admin.servicios.edit')->with(compact('renovacion'));
    }

    public function moverAlmacen(Request $request, $id)
    {
        $msg='Se movio al Almacen';
        $per = Servicio::find($id);
        $per->estado = "M";
        $per->update();
        
        $per = Difunto::find($request->id_difunto);
        $per->estado = "A";
        $per->update();

        $almacen = new Almacen();
        $almacen->servicio_id = $id;
        $almacen->fecha = date('Y-m-d H:i:s');
        $almacen->save();

   		Session::flash('msg', $msg);
   		return back();
    }
}
