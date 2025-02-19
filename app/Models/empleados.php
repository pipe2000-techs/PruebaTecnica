<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empleados extends Model
{
    //asignacion masiva
    protected $fillable = ['nombres','apellidos','identificacion','direccion','telefono','pais_nacimiento','ciudad_nacimiento','estado'];

    public function cargos()
    {
        return $this->hasMany(cargos::class, 'empleado_id', 'id'); 
    }
}
