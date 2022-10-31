<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class FamiliarController extends Controller
{
    private $validar = [
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required | numeric | min:8',
        'direccion' => 'required',
    ];

    public function index(Request $res)
    {
    	$query = $res->input('query');
        $familiars = Familiar::orderBy('nombre')->where('nombre', 'like', "%$query%")->paginate(10);
        return view('admin.familiares.index')->with(compact('familiars'));
    }

    public function edit($id)
    {
        $familyEdit = Familiar::find($id);
        return view('admin.familiares.edit')->with(compact('familyEdit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validar);
        $family =  Familiar::find($id);
        $family->nombre = $request->nombre;
        $family->apellido = $request->apellido;
        $family->CI = $request->ci;
        $family->telefono = $request->telefono;
        $family->direccion = $request->direccion;
        $family->email = $request->email;
        $family->save();
        return redirect('/admin/familiars');
    }

    public function destroy($id)
    {
        $msg='Se dio de baja al Familiar/a';
      
        $per = Familiar::find($id);
        $per->estado = "I";
        $per->update();

   		Session::flash('msg', $msg);
   		return back();
    }
}

