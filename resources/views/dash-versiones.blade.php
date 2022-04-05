<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Versiones De Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">



                     <div>
                        <a href="/versiones/create" class="add-new-button">Nueva</a>
                    </div>
                   
                    <table id="table_id">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Versión</th>
                                <th>Año</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($versiones as $version)

                            <tr>
                                <td>{{ $version->id }}</td>
                                <td>{{ ucwords($version->nombre) }}</td>
                                <td>{{ ucwords($version->ano->nombre) }}</td>
                                <td>{{ ucwords($version->ano->modelo->nombre) }}</td>
                                <td>{{ ucwords($version->ano->modelo->marca->nombre) }}</td>
                                <td>
                                    <div class="data-table-actions-layout">
                                        <div class="green-button">
                                            <a href="/versiones/{{ $version->id }}/edit">Modificar</a>
                                        </div>
                                        <div class="red-button">
                                            <a style="cursor:pointer;" class="eliminar" onclick="eliminar({{ $version->id }})">Eliminar</a>
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



<script type="text/javascript">

        function eliminar(id)
        {
            $.ajax({
                url: '/versiones/'+id,
                method: 'DELETE',
                data:{

                },
                success: function(response){
                    console.log(response)

                   window.location.replace('/dash-versiones');
                }
            });
        }

</script>