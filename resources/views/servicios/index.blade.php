@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-3">Lista de Servicios</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">
        Nuevo Servicio
    </a>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th>Servicio</th>
                <th>Descripción</th>
                <th>Vehículo</th>
                <th>Cliente</th>
                <th>Precio</th>
                <th>Fecha de Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @forelse($servicios as $servicio)

            <tr>
                <td>{{ $servicio->nombre }}</td>
                <td>{{ $servicio->descripcion }}</td>
                <td>{{ $servicio->vehiculo->marca }} {{ $servicio->vehiculo->modelo }} ({{ $servicio->vehiculo->placa }})</td>
                <td>{{ $servicio->vehiculo->cliente->nombre }} {{ $servicio->vehiculo->cliente->apellido }}</td>
                <td>{{ number_format($servicio->precio, 2) }}</td>
                <td>{{ $servicio->created_at->format('d/m/Y') }}</td>

                <td>

                    <a href="{{ route('servicios.show', $servicio) }}" class="btn btn-info btn-sm">
                        Ver
                    </a>

                    <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    @if(Auth::user()->isAdmin())
                    <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar servicio?')">
                            Eliminar
                        </button>
                    </form>
                    @endif

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center">No hay servicios registrados.</td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection