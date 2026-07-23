<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Models\Repuesto;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with('vehiculo.cliente')->get();

        return view('servicios.index', compact('servicios'));
    }

    public function create()
{
    $vehiculos = Vehiculo::with('cliente')->get();
    $repuestos = Repuesto::all();

    return view('servicios.create', compact('vehiculos', 'repuestos'));
}
   public function store(Request $request)
{
    $datos = $request->validate([
        'nombre' => 'required|max:150',
        'descripcion' => 'nullable|max:1000',
        'vehiculo_id' => 'required|exists:vehiculos,id',
        'precio' => 'required|numeric|min:0',
        'repuestos' => 'nullable|array',
        'repuestos.*' => 'exists:repuestos,id',
        'cantidades' => 'nullable|array',
    ]);

    $servicio = Servicio::create($datos);

    if ($request->filled('repuestos')) {
        foreach ($request->repuestos as $repuestoId) {
            $servicio->repuestos()->attach($repuestoId, [
                'cantidad' => $request->cantidades[$repuestoId] ?? 1,
            ]);
        }
    }

    return redirect()->route('servicios.index')
        ->with('success', 'Servicio registrado correctamente.');
}


    public function show(Servicio $servicio)
    {
        $servicio->load('vehiculo.cliente');

        return view('servicios.show', compact('servicio'));
    }

   public function edit(Servicio $servicio)
{
    $vehiculos = Vehiculo::with('cliente')->get();
    $repuestos = Repuesto::all();
    $servicio->load('repuestos');

    return view('servicios.edit', compact('servicio', 'vehiculos', 'repuestos'));
}
    public function update(Request $request, Servicio $servicio)
{
    $datos = $request->validate([
        'nombre' => 'required|max:150',
        'descripcion' => 'nullable|max:1000',
        'vehiculo_id' => 'required|exists:vehiculos,id',
        'precio' => 'required|numeric|min:0',
        'repuestos' => 'nullable|array',
        'repuestos.*' => 'exists:repuestos,id',
        'cantidades' => 'nullable|array',
    ]);

    $servicio->update($datos);

    $sync = [];
    if ($request->filled('repuestos')) {
        foreach ($request->repuestos as $repuestoId) {
            $sync[$repuestoId] = ['cantidad' => $request->cantidades[$repuestoId] ?? 1];
        }
    }
    $servicio->repuestos()->sync($sync);

    return redirect()->route('servicios.index')
        ->with('success', 'Servicio actualizado correctamente.');
}

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado correctamente.');
    }
}