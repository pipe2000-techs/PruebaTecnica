<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cargos extends Model
{
    protected $fillable = ['area','cargo','rol','jefe','estado','empleado_id'];

   
    public function empleados()
    {
        return $this->belongsTo(empleados::class, 'empleado_id', 'id'); //relacion uno a muchos, llave foranea, llave primaria
    }
}


