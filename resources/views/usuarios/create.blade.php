@extends('layouts.app')

@section('content')

<h2 class="mb-3">Nuevo Usuario</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Rol</label>
        <select name="role" class="form-select">
            <option value="empleado" {{ old('role') == 'empleado' ? 'selected' : '' }}>Empleado</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection