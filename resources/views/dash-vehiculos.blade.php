<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehiculos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">



                     <div>
                        <a href="{{ route('vehiculos.create') }}" class="add-new-button">Nuevo</a>
                    </div>
                   
                    <table id="table_id">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($vehiculos as $vehiculo)

                            <tr>
                                <td>{{ $vehiculo->id }}</td>
                                <td>{{ ucwords($vehiculo->marca->nombre) }}</td>
                                <td>{{ ucwords($vehiculo->modelo->nombre) }}</td>
                                <td>
                                    <div class="data-table-actions-layout">
                                        <div class="green-button">
                                            <a href="{{ route('vehiculos.edit', [
                                                'vehiculo' => $vehiculo->id
                                            ]) }}">Modificar</a>
                                        </div>
                                        <div class="red-button">
                                            <a style="cursor:pointer;" class="eliminar" onclick="eliminar({{ $vehiculo->id }})">Eliminar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable( {
            "iDisplayLength": 50
        });
    } );
</script>

<link rel="stylesheet" type="text/css" href="/css/dash-categorias.css">

<script type="text/javascript">

        function eliminar(id)
        {
            $.ajax({
                url: '/vehiculos/'+id,
                method: 'DELETE',
                data:{

                },
                success: function(response){
                    console.log(response)

                    window.location.replace('/dash-vehiculos');
                }
            });
        }

</script>