<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCargosRequest;
use App\Models\cargos;
use App\Models\empleados;
use Illuminate\Http\Request;

class cargosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$cargos = cargos::orderBy('id', 'desc') // Ordena por ID descendente
                     //->get();

        $cargos = cargos::orderBy('id', 'desc')->
                          with('empleados')
                          ->get();

        return view('cargos.index', ['cargos' => $cargos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //e,pleados activos
        $cargos = cargos::orderBy('id', 'desc')
                         ->where('rol', 'Jefe')
                         ->whereHas('empleados', function ($query) {
                            $query->where('estado', 1);  
                          })
                          ->with('empleados')
                          ->get();

        //return $cargos;

        return view('cargos.create', ['cargos' => $cargos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCargosRequest $request)
    {
        // Verificar si la cédula existe en la tabla empleados
        $empleado = empleados::where('identificacion', $request->identificacion)->first();

        if (!$empleado) {
            return redirect()->back()->with('errorCedula', 'La cédula ingresada no existe en la base de datos.');
        }

        $datos = $request->all();
        $datos['empleado_id'] = $empleado->id;

        $cargos = cargos::create($datos);

        //return $datos;
        return redirect()->route('cargos')->with('registrado','cargo registrado');
        
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
        $cargos = cargos::with('empleados')->find($id);
        //return $cargos;

        //e,pleados activos
        $empleadosCargo = cargos::orderBy('id', 'desc')
                         ->where('rol', 'Jefe')
                         ->whereHas('empleados', function ($query) {
                            $query->where('estado', 1);  
                          })
                          ->with('empleados')
                          ->get();

        return view('cargos.edit', compact('cargos', 'empleadosCargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'area' => 'required',
            'cargo' => 'required',
            'rol' => 'required',
            'jefe' => 'required',
        ]);

        $cargos = cargos::findOrFail($id);
        $cargos->update($request->all());
        return redirect()->route('cargos')->with('actulizado','Cargo Actulizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cargo = cargos::findOrFail($id);
        $cargo->update([
            'estado' => 0 
        ]);
        return redirect()->route('cargos')->with('eliminado','Cargo inactivo');
    }

    public function active(string $id)
    {
        $cargo = cargos::findOrFail($id);
        $cargo->update([
            'estado' => 1 
        ]);
        return redirect()->route('cargos')->with('activar','Cargo activado');
    }
}
