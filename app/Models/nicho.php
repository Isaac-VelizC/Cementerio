<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nicho extends Model
{
    use HasFactory;
    
    protected $table = "nichos";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'numero', 'fila', 'precio', 'estado', 'pabellon_id'];

    
    public function pabellon(){
        return $this->belongsTo(Pabellon::class, 'pabellon_id');
    }
    
}
