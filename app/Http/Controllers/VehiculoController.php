<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('cliente')->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $clientes = Cliente::all();

        return view('vehiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required|max:100',
            'modelo' => 'required|max:100',
            'placa' => 'required|unique:vehiculos',
            'anio' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|max:50',
        ]);

        Vehiculo::create($datos);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo registrado correctamente.');
    }

    public function edit(Vehiculo $vehiculo)
    {
        $clientes = Cliente::all();

        return view('vehiculos.edit', compact('vehiculo', 'clientes'));
    }

    public function show(Vehiculo $vehiculo)
    {
        $vehiculo->load('cliente');

        return view('vehiculos.show', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $datos = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required|max:100',
            'modelo' => 'required|max:100',
            'placa' => 'required|unique:vehiculos,placa,' . $vehiculo->id,
            'anio' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|max:50',
        ]);

        $vehiculo->update($datos);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado correctamente.');
    }
}