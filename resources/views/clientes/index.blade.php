@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-3">Lista de Clientes</h2>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">
        Nuevo Cliente
    </a>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Fecha de Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($clientes as $cliente)

            <tr>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->created_at->format('d/m/Y') }}</td>
                <td>

                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    @if(Auth::user()->isAdmin())
                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar cliente?')">
                            Eliminar
                        </button>
                    </form>
                    @endif

                </td>
            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center">No hay clientes registrados.</td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection