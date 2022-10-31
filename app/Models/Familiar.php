<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    use HasFactory;
    
    protected $table = "familiars";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'apellido', 'CI', 'telefono', 'direccion', 'email', 'estado', 'user_id'];

    
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
