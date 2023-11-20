<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'listado_capitulo'; 
    protected $primaryKey = 'id_capitulo';
}
