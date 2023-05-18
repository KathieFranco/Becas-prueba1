<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{
    use HasFactory;
    public $timestamps =  false;
    protected $fillable = ['nombre','promedio','sexo','semestre','edad','carrera','descripcion','tipo','enlace'];
}
