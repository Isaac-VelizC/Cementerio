<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\DifuntoController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NichoController;
use App\Http\Controllers\NotidicactionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\Search;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', [HomeController::class, 'index']);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/send', [NotidicactionController::class, 'index']);

/*Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

Route::post('/mark-as-read', 'PostController@markNotification')->name('markNotification');*/
    
Route::middleware(['auth', 'admin'])->namespace('Admin')->prefix('admin')->group(function () {
    //Route::get('/', [HomeController::class, 'index']);
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Notify
    Route::get('/send/{id}', [NotidicactionController::class, 'NotifyAlert']);
    //Personal
    Route::get('/personals', [PersonalController::class, 'index']);
	Route::get('/personals/create', [PersonalController::class, 'create']);
	Route::post('/personals', [PersonalController::class, 'store']);
	Route::get('/personals/{id}/edit', [PersonalController::class, 'edit']);
	Route::post('/personals/{id}/edit', [PersonalController::class, 'update']);
	Route::delete('/personals/{id}', [PersonalController::class, 'destroy']);
    //Servicios
    Route::get('/servicios', [ServicioController::class, 'index']);
	Route::get('/servicios/create', [ServicioController::class, 'create']);
	Route::post('/servicios', [ServicioController::class, 'store']);
    Route::get('/servicios/{id}/show', [ServicioController::class, 'show']);
    Route::get('/servicios/{id}/edit', [ServicioController::class, 'edit']);
	Route::post('/servicios/{id}/edit', [ServicioController::class, 'update']);
	Route::delete('/servicios/{id}', [ServicioController::class, 'moverAlmacen']);
    //Familiares
    Route::get('/familiars', [FamiliarController::class, 'index']);
    Route::get('/familiars/{id}/edit', [FamiliarController::class, 'edit']);
	Route::post('/familiars/{id}/edit', [FamiliarController::class, 'update']);
	Route::delete('/familiars/{id}', [FamiliarController::class, 'destroy']);
    //Nichos
    Route::get('/nichos', [NichoController::class, 'index']);
    //Difuntos
    Route::get('/difuntos', [DifuntoController::class, 'index']);
    Route::get('/difuntos/{id}/edit', [DifuntoController::class, 'edit']);
	Route::put('/difuntos/edit', [DifuntoController::class, 'update']);
	Route::delete('/difuntos/{id}', [DifuntoController::class, 'destroy']);
    //Almacen
    Route::get('/almacens', [AlmacenController::class, 'index']);
	Route::get('/almacens/create', [AlmacenController::class, 'create']);
	Route::post('/almacens', [AlmacenController::class, 'store']);
	Route::delete('/almacens/{id}', [AlmacenController::class, 'incinerar']);
    //nichos
    Route::get('/nichos/{id}/edit', [NichoController::class, 'edit']);
    Route::get('/nichos/{id}/nichoEdit', [NichoController::class, 'nichoEdit']);
	Route::put('/nichos/edit', [NichoController::class, 'update']);
    Route::get('/nichos/{id}/estado', [NichoController::class, 'editEstado']);
	Route::put('/nichos/{id}', [NichoController::class, 'updateEstado']);
	
    //Reservas
    Route::get('/reserva', [ReservaController::class, 'index']);
    Route::get('/reserva/{id}/edit', [ReservaController::class, 'edit']);
	Route::post('/reserva/{id}/edit', [ReservaController::class, 'update']);
    //provincias
    Route::get('/provincia/{id}', [ServicioController::class, 'provinciaDep']);
});

Route::get('/servicios/reserva', [ServicioController::class, 'reserva']);
Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');
Route::get('contact', function () {
    return view('client.contacto');
})->name('contact');


//Route::get('/perfil/{id}', [FamiliarController::class, 'perfil']);
//Route::post('/perfil/{id}/edit', [FamiliarController::class, 'perfilUpdate']);
Route::get('/reservaLista', [ReservaController::class, 'reservasCliente']);

Route::get('/search/{id}/info', [Search::class, 'infoDetalle']);
Route::get('/search', [Search::class, 'show']);
Route::get('products/json',[Search::class, 'data']);

Route::get('/reserva/{id}/estado', [NichoController::class, 'nichoReserva']);
Route::post('/reserva', [NichoController::class, 'addReserva']);
