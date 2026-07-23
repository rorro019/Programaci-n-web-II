<?php

namespace App\Http\Controllers;

use App\Models\Repuesto;
use Illuminate\Http\Request;


class RepuestoController extends Controller
{
    public function index()
    {
        $repuestos = Repuesto::all();

        return view('repuestos.index', compact('repuestos'));
    }

    public function create()
    {
        return view('repuestos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|max:150',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'proveedor' => 'nullable|max:150',
        ]);

        Repuesto::create($datos);

        return redirect()->route('repuestos.index')
            ->with('success', 'Repuesto registrado correctamente.');
    }

    public function edit(Repuesto $repuesto)
    {
        return view('repuestos.edit', compact('repuesto'));
    }

    public function update(Request $request, Repuesto $repuesto)
    {
        $datos = $request->validate([
            'nombre' => 'required|max:150',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'proveedor' => 'nullable|max:150',
        ]);

        $repuesto->update($datos);

        return redirect()->route('repuestos.index')
            ->with('success', 'Repuesto actualizado correctamente.');
    }

    public function destroy(Repuesto $repuesto)
    {
        $repuesto->delete();

        return redirect()->route('repuestos.index')
            ->with('success', 'Repuesto eliminado correctamente.');
    }
}