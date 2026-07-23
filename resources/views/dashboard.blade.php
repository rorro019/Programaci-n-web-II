@extends('layouts.app')

@section('content')

<h2 class="mb-4 fw-bold">Dashboard</h2>

<div class="row g-3 mb-4">

    <div class="col-6 col-lg-3">
        <div class="card stat-card h-100" style="border-left-color:#2563eb">
            <div class="card-body">
                <div class="text-primary fw-semibold small">Clientes</div>
                <h2 class="fw-bold mb-0">{{ $totalClientes }}</h2>
                <small class="text-muted">Clientes registrados</small>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="card stat-card h-100" style="border-left-color:#16a34a">
            <div class="card-body">
                <div class="fw-semibold small" style="color:#16a34a">Vehículos</div>
                <h2 class="fw-bold mb-0">{{ $totalVehiculos }}</h2>
                <small class="text-muted">Vehículos registrados</small>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="card stat-card h-100" style="border-left-color:#f59e0b">
            <div class="card-body">
                <div class="fw-semibold small" style="color:#f59e0b">Servicios</div>
                <h2 class="fw-bold mb-0">{{ $totalServicios }}</h2>
                <small class="text-muted">Servicios registrados</small>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="card stat-card h-100" style="border-left-color:#8b5cf6">
            <div class="fw-semibold small" style="color:#8b5cf6">Ingresos</div>
            <div class="card-body pt-0">
                <h2 class="fw-bold mb-0">{{ number_format($totalIngresos, 2) }}</h2>
                <small class="text-muted">Ingresos totales</small>
            </div>
        </div>
    </div>

</div>

<div class="row g-3 mb-4 justify-content-center">

    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Ingresos (últimos 6 meses)</h6>
                <canvas id="graficoIngresos" height="140"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header bg-white fw-bold">
        Últimos servicios registrados
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Servicio</th>
                    <th>Vehículo</th>
                    <th>Cliente</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ultimosServicios as $servicio)
                    <tr>
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ $servicio->vehiculo->marca }} {{ $servicio->vehiculo->modelo }}</td>
                        <td>{{ $servicio->vehiculo->cliente->nombre }} {{ $servicio->vehiculo->cliente->apellido }}</td>
                        <td>{{ number_format($servicio->precio, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">Aún no hay servicios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
    new Chart(document.getElementById('graficoIngresos'), {
        type: 'line',
        data: {
            labels: {!! json_encode($meses) !!},
            datasets: [{
                label: 'Ingresos',
                data: {!! json_encode($ingresosPorMes) !!},
                borderColor: '#a02957',
                backgroundColor: 'rgba(37,99,235,.1)',
                fill: true,
                tension: .3
            }]
        },
        options: { plugins: { legend: { display: false } } }
    });
</script>
@endsection