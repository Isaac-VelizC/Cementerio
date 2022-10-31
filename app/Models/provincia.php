<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provincia extends Model
{
    use HasFactory;

    protected $table = "provincias";
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'ciudad_id'];

    public function ciudad(){
        return $this->belongsTo(ciudad::class, 'ciudad_id');
    }
}
