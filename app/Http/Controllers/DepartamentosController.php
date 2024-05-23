<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Departamentos;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Departamentos::orderBy('id', 'desc')->paginate(5);
        return view('departamentos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //dd($request);
        Departamentos::create($request->all());    
        return redirect()->route('departamentos.index')
                         ->with('success', 'Departamento creado exitosamente.');
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
    public function edit(string $id):View
    {
        
        $departamento = Departamentos::find($id);
        return view('departamentos.edit',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $departamento = Departamentos::find($id);
        $departamento->update($request->all());
        
        return redirect()->route('departamentos.index')
                        ->with('success','Departamento updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamento = Departamentos::find($id);
        $departamento->delete();
         
        return redirect()->route('departamentos.index')
                        ->with('success','departamento eliminado exitosamente');
    }
}