@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-3">Editar Servicio</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('servicios.update', $servicio) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del servicio</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                value="{{ old('nombre', $servicio->nombre) }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $servicio->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="vehiculo_id" class="form-label">Vehículo</label>
            <select name="vehiculo_id" id="vehiculo_id" class="form-select">
                <option value="">-- Selecciona un vehículo --</option>
                @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}"
                        {{ old('vehiculo_id', $servicio->vehiculo_id) == $vehiculo->id ? 'selected' : '' }}>
                        {{ $vehiculo->marca }} {{ $vehiculo->modelo }} - {{ $vehiculo->placa }}
                        (Cliente: {{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control"
                value="{{ old('precio', $servicio->precio) }}">

        </div>

        <div class="mb-3">
    <label class="form-label">Repuestos utilizados (opcional)</label>

    <div class="border rounded p-3">
        @forelse($repuestos as $repuesto)
            @php
                $asociado = $servicio->repuestos->firstWhere('id', $repuesto->id);
            @endphp
            <div class="row align-items-center mb-2">
                <div class="col-auto">
                    <input class="form-check-input" type="checkbox"
                        name="repuestos[]" value="{{ $repuesto->id }}"
                        id="repuesto_{{ $repuesto->id }}"
                        {{ $asociado ? 'checked' : '' }}>
                </div>
                <div class="col">
                    <label for="repuesto_{{ $repuesto->id }}">
                        {{ $repuesto->nombre }} (Stock: {{ $repuesto->stock }})
                    </label>
                </div>
                <div class="col-auto">
                    <input type="number" min="1" class="form-control form-control-sm"
                        style="width: 80px"
                        name="cantidades[{{ $repuesto->id }}]"
                        value="{{ $asociado->pivot->cantidad ?? 1 }}" placeholder="Cant.">
                </div>
            </div>
        @empty
            <p class="text-muted mb-0">No hay repuestos registrados todavía.</p>
        @endforelse
    </div>
</div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

</div>

@endsection