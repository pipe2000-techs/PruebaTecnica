<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEmpleadoRequest;
use Illuminate\Http\Request;

//modelos
use App\Models\empleados;

class empleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = empleados::orderBy('id', 'desc') // Ordena por ID descendente
                     ->get();

        return view('empleados.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeEmpleadoRequest $request)
    {
        $empleado = empleados::create($request->all());
        return redirect()->route('empleados')->with('registrado','Empleado registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = empleados::find($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => ['required',"unique:empleados,identificacion,{$request->id}",'min:6','max:11'],
            'direccion' => 'required',
            'telefono' => 'required',
            'pais_nacimiento' => 'required',
            'ciudad_nacimiento' => 'required',
        ]);

        $empleado = empleados::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados')->with('actulizado','Empleado Actulizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = empleados::findOrFail($id);
        $empleado->update([
            'estado' => 0 
        ]);
        return redirect()->route('empleados')->with('eliminado','Empleado inactivo');
    }

    public function active(string $id)
    {
        $empleado = empleados::findOrFail($id);
        $empleado->update([
            'estado' => 1 
        ]);
        return redirect()->route('empleados')->with('activar','Empleado activado');
    }
}

