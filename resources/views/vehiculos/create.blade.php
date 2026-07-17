@extends('layouts.app')

@section('content')

<div class="container">

<h2>Registrar Vehículo</h2>

<form action="{{ route('vehiculos.store') }}" method="POST">

@csrf

<div class="mb-3">
<label>Marca</label>
<input type="text" name="marca" class="form-control">
</div>

<div class="mb-3">
<label>Modelo</label>
<input type="text" name="modelo" class="form-control">
</div>

<div class="mb-3">
<label>Placa</label>
<input type="text" name="placa" class="form-control">
</div>

<div class="mb-3">
<label>Año</label>
<input type="number" name="año" class="form-control">
</div>

<div class="mb-3">
<label>Color</label>
<input type="text" name="color" class="form-control">
</div>

<button class="btn btn-success">
Guardar
</button>

<a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">
Cancelar
</a>

</form>

</div>

@endsection