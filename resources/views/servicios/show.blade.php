@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-3">Detalle del Servicio</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Servicio:</strong> {{ $servicio->nombre }}</p>
            <p><strong>Descripción:</strong> {{ $servicio->descripcion }}</p>
            <p><strong>Vehículo:</strong> {{ $servicio->vehiculo->marca }} {{ $servicio->vehiculo->modelo }} ({{ $servicio->vehiculo->placa }})</p>
            <p><strong>Cliente:</strong> {{ $servicio->vehiculo->cliente->nombre }} {{ $servicio->vehiculo->cliente->apellido }}</p>
            <p><strong>Precio:</strong> {{ number_format($servicio->precio, 2) }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver</a>
    </div>

</div>

@endsection