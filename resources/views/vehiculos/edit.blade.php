@extends('layouts.app')

@section('content')

<div class="container">

<h2>Editar Vehículo</h2>

<form action="{{ route('vehiculos.update',$vehiculo) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Marca</label>
<input type="text" name="marca" class="form-control" value="{{ $vehiculo->marca }}">
</div>

<div class="mb-3">
<label>Modelo</label>
<input type="text" name="modelo" class="form-control" value="{{ $vehiculo->modelo }}">
</div>

<div class="mb-3">
<label>Placa</label>
<input type="text" name="placa" class="form-control" value="{{ $vehiculo->placa }}">
</div>

<div class="mb-3">
<label>Año</label>
<input type="number" name="año" class="form-control" value="{{ $vehiculo->año }}">
</div>

<div class="mb-3">
<label>Color</label>
<input type="text" name="color" class="form-control" value="{{ $vehiculo->color }}">
</div>

<button class="btn btn-primary">
Actualizar
</button>

<a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">
Cancelar
</a>

</form>

</div>

@endsection