<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    
    protected $table = "servicios";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'codigo', 'difunto_id', 'familiar_id', 'nicho_id', 'sector_id', 'precio', 'fecha_registro', 'fecha_limite', 'estado', 'estado_pago', 'descripcion'];

    public function familiar(){
        return $this->belongsTo(Familiar::class, 'familiar_id');
    }

    public function difunto(){
        return $this->belongsTo(Difunto::class, 'difunto_id');
    }

    public function nicho(){
        return $this->belongsTo(nicho::class, 'nicho_id');
    }
    
    public function sector(){
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
