<?php

namespace App\Http\Controllers;

use App\Models\Difunto;
use App\Models\Familiar;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Search extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
    	$difunto = Difunto::where('nombre', 'like', "%$query%")->paginate(5);

        /*if($familiar->count() == 1){
            $id = $familiar->first()->id;
            return redirect("/products/$id");
        }*/
        return view('search.show')->with(compact('difunto', 'query'));
    }

    public function infoDetalle($id)
    {
        //$sql = 'SELECT * FROM servicios WHERE difunto_id = '.$id.'';
        //$servicioShow = DB::select($sql);
        $servicioShow = Servicio::where('difunto_id', $id)->get();
        return view('search.info')->with(compact('servicioShow'));
    }
    
}
