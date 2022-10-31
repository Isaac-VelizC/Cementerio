<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabellon extends Model
{
    use HasFactory;
    
    protected $table = "pabellons";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'codigo'];

}
