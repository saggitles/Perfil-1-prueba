<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Departamentos;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Empleados::orderBy('id', 'desc')->paginate(5);
        return view('empleados.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamentos::all();
        return view('empleados.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //dd($request);
        Empleados::create($request->all());    
        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado creado exitosamente.');
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
    public function edit(string $id) : View
    {
        
        $empleado = Empleados::find($id);
        $departamentos = Departamentos::all();
        return view('empleados.edit',compact('empleado','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $empleado = Empleados::find($id);
        $empleado->update($request->all());
        
        return redirect()->route('empleados.index')
                        ->with('success','Empleado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Empleados::find($id);
        $empleado->delete();
         
        return redirect()->route('empleados.index')
                        ->with('success','Empleado eliminado exitosamente');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = Empleados::where('empleados.name', 'like', "%{$query}%")
                ->orWhere('departamentos.descripcion', 'like', "%{$query}%")
                ->join('departamentos', 'empleados.departamento_id', '=', 'departamentos.id')
                ->paginate(5);
        
        return view('empleados.index', compact('data', 'query'));
    }
}
