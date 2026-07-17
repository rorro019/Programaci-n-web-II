<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Registrar Cliente
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm rounded-lg">

                <form action="{{ route('clientes.store') }}" method="POST">

                    @csrf

                    <div>
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="border rounded w-full">
                    </div>


                    <div>
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="border rounded w-full">
                    </div>


                    <div>
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="border rounded w-full">
                    </div>


                    <div>
                        <label>Email</label>
                        <input type="email" name="email" class="border rounded w-full">
                    </div>


                    <div>
                        <label>Dirección</label>
                        <input type="text" name="direccion" class="border rounded w-full">
                    </div>


                    <br>

                    <button type="submit"
                     style="background-color: #09ad3a; color: white; padding: 10px 20px; border-radius: 5px;">
                     Guardar Cliente
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>