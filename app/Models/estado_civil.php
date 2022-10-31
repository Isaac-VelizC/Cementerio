<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_civil extends Model
{
    use HasFactory;
    
    protected $table = "estado_civils";
    protected $primaryKey = "id";
    protected $fillable = ['civil'];
}
