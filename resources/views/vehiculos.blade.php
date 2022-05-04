@extends('layouts.busqueda')
@section('page_title', 'Vehículo')
@section('content')


<div class="p-b-10">
	<h3 class="ltext-105 cl5 txt-center respon1">


	</h3>
</div>


<div class="bg0 m-t-23 p-b-140 product-list-container">
<div class="container tabla-vehiculos-layout">


<div class="table-scroll w-100">
    

<table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Tipo de Modelo</th>
                                <th>CC</th>
                                <th>Modelo del Motor</th>
                                <th>KW</th>
                                <th>CV</th>
                                <th>Año de Fabricación</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($vehiculos as $vehiculo)

                            <tr>
                                <td>{{ $vehiculo->tipo_modelo }}</td>
                                <td>{{ $vehiculo->cc }}</td>
                                <td>{{ ucwords($vehiculo->modelo_motor) }}</td>
                                <td>{{ $vehiculo->kw }}</td>
                                <td>{{ $vehiculo->cv }}</td>
                                <td>{{ $vehiculo->ano_fabricacion }}</td>
                                <td>
                                	<a href="/ver-vehiculo/{{ $vehiculo->id }}">Ver</a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
</div>

</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable( {
            "iDisplayLength": 50,
            "dom": '<"top">rt<"bottom"><"clear">',
            responsive: true
        });
    } );
</script>
<style type="text/css">
	#table_id{
		border: 1px solid #111;
	}

    #table_id th{
           font-family: Poppins-Regular;
    font-size: 1.2rem;
    color: #888;
    line-height: 1.2;

    }

    #table_id td a{
        font-family: Poppins-Regular;
        font-size: 20px;
        line-height: 1.923;
        color: #a5c926;
        transition: ease .4s;
    }

    #table_id td a:hover{
        color: #222;
    }

</style>

@endsection