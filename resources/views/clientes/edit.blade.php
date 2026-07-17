<x-app-layout>

    <x-slot name="header">
        <h2>
            Editar Cliente
        </h2>
    </x-slot>


    <div>

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">

            @csrf
            @method('PUT')


            <label>Nombre</label>
            <input type="text" 
                   name="nombre" 
                   value="{{ $cliente->nombre }}">


            <br>


            <label>Apellido</label>
            <input type="text" 
                   name="apellido" 
                   value="{{ $cliente->apellido }}">


            <br>


            <label>Teléfono</label>
            <input type="text" 
                   name="telefono" 
                   value="{{ $cliente->telefono }}">


            <br>


            <label>Email</label>
            <input type="email" 
                   name="email" 
                   value="{{ $cliente->email }}">


            <br>


            <label>Dirección</label>
            <input type="text" 
                   name="direccion" 
                   value="{{ $cliente->direccion }}">


            <br><br>


            <button type="submit">
                Actualizar Cliente
            </button>


        </form>

    </div>


</x-app-layout>