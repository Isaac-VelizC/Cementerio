<?php

namespace App\Http\Controllers;

use App\Events\ServicioEvent;
use App\Models\Servicio;
use App\Notifications\SendEmailNotidicaction;
use Illuminate\Http\Request;

class NotidicactionController extends Controller
{
    //

    public function NotifyAlert($id)
    {
        $servicio = Servicio::find($id);
        event(new ServicioEvent($servicio));

        return redirect()->back()->with('msg', 'Se envio una notificacion');
    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
                ->when($request->input('id'), function($query) use ($request){
                    return $query->where('id', $request->input('id'));
                })->markAsRead();
        return response()->noContent();
    }
}
