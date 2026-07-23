@extends('layouts.app')

@section('content')

<h2 class="mb-3">Usuarios del Sistema</h2>

<a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">
    Nuevo Usuario
</a>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Fecha de Registro</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>
                <span class="badge {{ $usuario->role === 'admin' ? 'bg-primary' : 'bg-secondary' }}">
                    {{ ucfirst($usuario->role) }}
                </span>
            </td>
            <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection