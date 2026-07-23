<nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            {{ config('app.name', 'Taller Automotriz') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}"
                            href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('clientes.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('clientes.index') }}">
                            Clientes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('vehiculos.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('vehiculos.index') }}">
                            Vehículos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('servicios.*') ? 'active fw-bold' : '' }}"
                            href="{{ route('servicios.index') }}">
                            Servicios
                        </a>
                    </li>
                @endauth

            </ul>

            @auth
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Perfil
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            @endauth

        </div>

    </div>
</nav>