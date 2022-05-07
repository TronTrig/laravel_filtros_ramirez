@extends('layouts.busqueda')
@section('page_title', 'Resultados de Código')
@section('content')


<div class="p-b-10">
	<h3 class="ltext-105 cl5 txt-center respon1">


	</h3>
</div>


<div class="bg0 m-t-23 p-b-140 product-list-container">
<div class="container tabla-vehiculos-layout">


<div class="table-scroll w-100">
    

<table id="table_id" class="display w-100">
                        <thead>
                            <tr>
                                <th>Referencia del Filtro</th>
                                <th>Aplicación Básica</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($productos as $producto)

                            <tr>
                                <td>

                                    @if($producto->categoria_id == 1)
                                    @switch($producto->subcategoria_id)
                                        @case(1)
                                            <span class="filter-icon-wrap">
                                                <img src="/images/icons/b_filtros_de_aire.png"
                                                class="filter-icon">
                                            </span>
                                            @break

                                        @case(2)
                                            <span class="filter-icon-wrap">
                                                <img src="/images/icons/b_filtros_de_aceite.png" class="filter-icon">
                                            </span>
                                            @break

                                        @case(3)
                                            <span class="filter-icon-wrap">
                                                <img src="/images/icons/b_filtros_de_gasolina.png" class="filter-icon">
                                            </span>
                                            @break

                                        @case(4)
                                            <span class="filter-icon-wrap">
                                                <img src="/images/icons/b_filtros_de_habitaculo.png" class="filter-icon">
                                            </span>
                                            @break

                                        @case(5)
                                            <span class="filter-icon-wrap">
                                                <img src="/images/icons/b_filtros_otros.png" class="filter-icon">
                                            </span>
                                            @break


                                    @endswitch
                                    @endif

                                   <span>{{ $producto->sku }}</span>
                                </td>
                                <td>
                                    @foreach( $producto->vehiculos as $vehiculo)
                                        {{ ucwords($vehiculo->marca->nombre) }} {{ ucwords($vehiculo->modelo->nombre) }},
                                    @endforeach

                                    
                                </td>
                                <td>
                                	<a href="/ver-producto/{{ $producto->id }}">Ver</a>
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
            responsive: true,
            "columnDefs": [
                { "width": "20%", "targets": 0 }
              ]
        });
    } );
</script>
<style type="text/css">
	#table_id{
		border: 1px solid #111;
	}

    #table_id .filter-icon{
        width: 50px;
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