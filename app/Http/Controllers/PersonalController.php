<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PersonalController extends Controller
{
    private $validarUnique = [
        'CI' => ['required', 'string', 'max:10', 'unique:personals'],
        'email' =>  ['required', 'string', 'email', 'max:255', 'unique:personals'],
    ];
    private $validar = [
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required | numeric | min:8',
        'direccion' => 'required',
        'salario' => 'required',
    ];
    public function index(Request $res)
    {
    	$query = $res->input('query');
        $trabajadores = Personal::orderBy('nombre')->where('nombre', 'like', "%$query%")->paginate(10);
        return view('admin.personal.index')->with(compact('trabajadores'));
    }

    public function create()
    {
        $sector = Sector::all();
        return view('admin.personal.create')->with(compact('sector'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validarUnique);
        $request->validate($this->validar);

        $pers = new Personal();
        $pers->nombre = $request->nombre;
        $pers->apellido = $request->apellido;
        $pers->CI = $request->CI;
        $pers->telefono = $request->telefono;
        $pers->direccion = $request->direccion;
        $pers->email = $request->email;
        $pers->salario = $request->salario;
        $pers->sector_id = $request->sector_id;
        $pers->save();
        return redirect('/admin/personals');
    }

    public function edit($id)
    {
        $sector = Sector::all();
        $personalEdit = Personal::find($id);
        return view('admin.personal.edit')->with(compact('personalEdit','sector'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validar);
        $pers =  Personal::find($id);
        $pers->nombre = $request->nombre;
        $pers->apellido = $request->apellido;
        $pers->CI = $request->CI;
        $pers->telefono = $request->telefono;
        $pers->direccion = $request->direccion;
        $pers->email = $request->email;
        $pers->salario = $request->salario;
        $pers->sector_id = $request->sector_id;
        $pers->save();
        return redirect('/admin/personals');
    }

    public function destroy($id)
    {
        $msg='Se dio de baja al Trabajador/a';
      
        $per = Personal::find($id);
        $per->estado = "I";
        $per->update();

   		Session::flash('msg', $msg);
   		return back();
    }
}
