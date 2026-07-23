<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Taller Pro') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --sidebar-bg: #1a2332;
            --sidebar-active: #2563eb;
            --brand: #2563eb;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f1f5f9;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: var(--sidebar-bg);
            color: #cbd5e1;
            position: fixed;
            top: 0;
            left: 0;
            transition: margin-left .2s ease-in-out;
            z-index: 1030;
        }

        .sidebar.collapsed {
            margin-left: -240px;
        }

        .sidebar .brand {
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 1.25rem 1.25rem;
            display: flex;
            align-items: center;
            gap: .5rem;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        .sidebar .nav-link {
            color: #cbd5e1;
            padding: .65rem 1.25rem;
            border-radius: .5rem;
            margin: .15rem .75rem;
            display: flex;
            align-items: center;
            gap: .6rem;
            font-size: .92rem;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,.06);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: var(--sidebar-active);
            color: #fff;
        }

        .main-wrapper {
            margin-left: 240px;
            transition: margin-left .2s ease-in-out;
        }

        .main-wrapper.expanded {
            margin-left: 0;
        }

        .topbar {
            background-color: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: .85rem 1.5rem;
        }

        .stat-card {
            border: none;
            border-radius: .75rem;
            border-left: 5px solid var(--brand);
            box-shadow: 0 1px 3px rgba(0,0,0,.06);
        }

        @media (max-width: 768px) {
            .sidebar { margin-left: -240px; }
            .sidebar.show { margin-left: 0; }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

@auth
    <div class="sidebar" id="sidebar">
        <div class="brand">
            <i class="bi bi-car-front-fill fs-4"></i>
            <span>TALLER PRO</span>
        </div>

        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}" href="{{ route('clientes.index') }}">
                    <i class="bi bi-people-fill"></i> Clientes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('vehiculos.*') ? 'active' : '' }}" href="{{ route('vehiculos.index') }}">
                    <i class="bi bi-car-front"></i> Vehículos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('servicios.*') ? 'active' : '' }}" href="{{ route('servicios.index') }}">
                    <i class="bi bi-tools"></i> Servicios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('repuestos.*') ? 'active' : '' }}" href="{{ route('repuestos.index') }}">
                    <i class="bi bi-gear-fill"></i> Repuestos
                </a>
            </li>
           @if(Auth::user()->isAdmin())
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('reportes.*') ? 'active' : '' }}" href="{{ route('reportes.index') }}">
            <i class="bi bi-bar-chart-fill"></i> Reportes
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}" href="{{ route('usuarios.index') }}">
            <i class="bi bi-person-badge-fill"></i> Usuarios
        </a>
    </li>
@endif
        </ul>
    </div>

    <div class="main-wrapper" id="mainWrapper">

        <nav class="topbar d-flex justify-content-between align-items-center">
            <button class="btn btn-light border" id="toggleSidebar">
                <i class="bi bi-list fs-5"></i>
            </button>

            <div class="dropdown">
                <button class="btn btn-light border dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-5"></i>
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        @if (session('success'))
            <div class="alert alert-success mx-3 mt-3">{{ session('success') }}</div>
        @endif

        <main class="p-3 p-md-4">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('mainWrapper').classList.toggle('expanded');
        });
    </script>

@else
    <main class="py-5">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endauth

@yield('scripts')

</body>
</html>