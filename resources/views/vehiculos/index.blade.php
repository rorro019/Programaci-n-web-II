@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-3">Lista de Vehículos</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary mb-3">
        Nuevo Vehículo
    </a>

    <table class="table table-bordered table-hover">

    <thead class="table-dark">
        <tr>
            <th>Cliente</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Año</th>
            <th>Color</th>
            <th>Fecha de Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @forelse($vehiculos as $vehiculo)

        <tr>
            <td>{{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }}</td>
            <td>{{ $vehiculo->marca }}</td>
            <td>{{ $vehiculo->modelo }}</td>
            <td>{{ $vehiculo->placa }}</td>
            <td>{{ $vehiculo->anio }}</td>
            <td>{{ $vehiculo->color }}</td>
            <td>{{ $vehiculo->created_at->format('d/m/Y') }}</td>

            <td>

                <a href="{{ route('vehiculos.edit',$vehiculo) }}" class="btn btn-warning btn-sm">
                    Editar
                </a>

                @if(Auth::user()->isAdmin())
                <form action="{{ route('vehiculos.destroy',$vehiculo) }}" method="POST" class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Eliminar vehículo?')">

                        Eliminar

                    </button>
                
                </form>
                @endif

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="8" class="text-center">No hay vehículos registrados.</td>
        </tr>

        @endforelse

    </tbody>

</table>


</div>

@endsection