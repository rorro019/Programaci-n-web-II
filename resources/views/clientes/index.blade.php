<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Clientes
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm rounded-lg">

                <h3>
                    Lista de Clientes
                </h3>


                <br>


                <a href="{{ route('clientes.create') }}">
                    Nuevo Cliente
                </a>


                <br><br>


                <table border="1" cellpadding="10" width="100%">

                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach($clientes as $cliente)

                            <tr>

                                <td>{{ $cliente->nombre }}</td>

                                <td>{{ $cliente->apellido }}</td>

                                <td>{{ $cliente->telefono }}</td>

                                <td>{{ $cliente->email }}</td>

                                <td>{{ $cliente->direccion }}</td>
                                <td>

                                <a href="{{ route('clientes.edit', $cliente->id) }}">
                                    Editar
                                </a>


                                <form action="{{ route('clientes.destroy', $cliente->id) }}" 
                                    method="POST" 
                                    style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        Eliminar
                                    </button>

                                </form>

                            </td>

                                                        </tr>

                        @endforeach

                    </tbody>

                </table>


            </div>

        </div>

    </div>


</x-app-layout>