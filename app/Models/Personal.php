<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    
    protected $table = "personals";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'apellido', 'CI', 'telefono', 'direccion', 'email', 'salario', 'estado', 'sector_id'];

    public function sectors(){
        return $this->belongsTo(Sector::class, 'sector_id');
    }

}
