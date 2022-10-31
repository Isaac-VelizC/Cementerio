<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    
    protected $table = "almacens";
    protected $primaryKey = "id";
    protected $fillable = ['servicio_id', 'fecha', 'estado'];

    public function servicio(){
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
