@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-3">Nuevo Vehículo</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label for="cliente_id" class="form-label">Cliente</label>
    <select name="cliente_id" id="cliente_id" class="form-select">
        <option value="">-- Selecciona un cliente --</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nombre }} {{ $cliente->apellido }}
            </option>
        @endforeach
    </select>
</div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control"
                value="{{ old('marca') }}">
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control"
                value="{{ old('modelo') }}">
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" name="placa" id="placa" class="form-control"
                value="{{ old('placa') }}">
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" name="anio" id="anio" class="form-control"
                value="{{ old('anio') }}">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" name="color" id="color" class="form-control"
                value="{{ old('color') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

</div>

@endsection