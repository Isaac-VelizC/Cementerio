<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difunto extends Model
{
    use HasFactory;
    
    protected $table = "difuntos";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'nombre', 'apellido', 'difunto_ci', 'reserva', 'civil_id', 'provincia_id', 'causa_muerte', 'fecha_nacimiento', 'fecha_muerte', 'estado'];

    public function civil(){
        return $this->belongsTo(estado_civil::class, 'civil_id');
    }

    public function provincia(){
        return $this->belongsTo(provincia::class, 'provincia_id');
    }
}
