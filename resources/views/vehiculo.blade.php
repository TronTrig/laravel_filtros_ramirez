@extends('layouts.main')
@section('page_title', 'Vehículo')
@section('content')


<div class="p-b-10">
	<h3 class="ltext-105 cl5 txt-center respon1">


	</h3>
</div>


<div class="bg0 m-t-23 p-b-140 product-list-container">
<div class="container tabla-vehiculos-layout">



<div class="table-scroll">
<table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Tipo de Modelo</th>
                                <th>CC</th>
                                <th>Modelo del Motor</th>
                                <th>KW</th>
                                <th>CV</th>
                                <th>Año de Fabricación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $vehiculo->tipo_modelo }}</td>
                                <td>{{ $vehiculo->cc }}</td>
                                <td>{{ ucwords($vehiculo->modelo_motor) }}</td>
                                <td>{{ $vehiculo->kw }}</td>
                                <td>{{ $vehiculo->cv }}</td>
                                <td>{{ $vehiculo->ano_fabricacion }}</td>
                            </tr>
                        </tbody>
                    </table>

</div>
<div class="table-scroll">

                    <table id="table_id_2" class="display">
                        <thead>
                            <tr>
                                <th>
                                    <div class="icono-de-filtro-1">
                                        
                                    </div>
                                    <div class="icono-de-filtro-label">
                                        Filtros De Aire
                                    </div>
                                </th>
                                <th>
                                    <div class="icono-de-filtro-2">
                                        
                                    </div>
                                    <div class="icono-de-filtro-label">
                                        Filtros De Aceite
                                    </div>
                                </th>
                                <th>
                                    <div class="icono-de-filtro-3">
                                        
                                    </div>
                                    <div class="icono-de-filtro-label">
                                        Filtros De Combustible
                                    </div>
                                </th>
                                <th>
                                    <div class="icono-de-filtro-4">
                                        
                                    </div>
                                    <div class="icono-de-filtro-label">
                                        Filtros De Habitáculo
                                    </div>
                                </th>
                                <th>
                                    <div class="icono-de-filtro-5">
                                        
                                    </div>
                                    <div class="icono-de-filtro-label">
                                        Otros Filtros
                                    </div>
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $i = 0
                            @endphp

                            @foreach($subcategoria_con_mas_elementos as $filtros)
                            
                                <tr>
                                    <td>

                                        @if(count($filtros_aire) > 0)
                                            <a href="">
                                                <p>{{ $filtros_aire->get($i)->sku }}</p>
                                                
                                                <img src="/images/productos/{{  $filtros_aire->get($i)->id}}/{{  $filtros_aire->get($i)->id}}.jpg"
                                        class="img-table">                  
                                            </a>              
                                        @else
                                            <p>
                                                Sin filtro de este tipo
                                            </p>
                                        @endif
                                    </td>
                                    <td>

                                        @if(count($filtros_aceite) > 0)
                                            <a href="">
                                                <p>{{ $filtros_aceite->get($i)->sku }}</p>
                                                
                                                <img src="/images/productos/{{  $filtros_aceite->get($i)->id}}/{{  $filtros_aceite->get($i)->id}}.jpg"
                                        class="img-table">                  
                                            </a>              
                                        @else
                                            <p>
                                                Sin filtro de este tipo
                                            </p>
                                        @endif
                                    </td>
                                    <td>

                                        @if(count($filtros_gasolina) > 0)
                                            <a href="">
                                                <p>{{ $filtros_gasolina->get($i)->sku }}</p>
                                                
                                                <img src="/images/productos/{{  $filtros_gasolina->get($i)->id}}/{{  $filtros_gasolina->get($i)->id}}.jpg"
                                        class="img-table">                  
                                            </a>              
                                        @else
                                            <p>
                                                Sin filtro de este tipo
                                            </p>
                                        @endif
                                    </td>
                                    <td>
                                        @if(count($filtros_habitaculo) > 0)
                                            <a href="">
                                                <p>{{ $filtros_habitaculo->get($i)->sku }}</p>
                                                
                                                <img src="/images/productos/{{  $filtros_habitaculo->get($i)->id}}/{{  $filtros_habitaculo->get($i)->id}}.jpg"
                                        class="img-table">                  
                                            </a>              
                                        @else
                                            <p>
                                                Sin filtro de este tipo
                                            </p>
                                        @endif
                                    </td>

                                    <td>

                                        @if(count($filtros_otros) > 0)
                                            <a href="">
                                                <p>{{ $filtros_otros->get($i)->sku }}</p>
                                                
                                                <img src="/images/productos/{{  $filtros_otros->get($i)->id}}/{{  $filtros_otros->get($i)->id}}.jpg"
                                        class="img-table">                  
                                            </a>              
                                        @else
                                            <p>
                                                Sin filtro de este tipo
                                            </p>
                                        @endif
                                    </td>

                                </tr>

                            @php
                                $i++
                            @endphp

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
           
        });
    } );
</script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id_2').DataTable( {
            "iDisplayLength": 50,
            "dom": '<"top">rt<"bottom"><"clear">',
            responsive: true,

        });
    } );
</script>
<style type="text/css">
    #table_id{
        border: 1px solid #111;
    }

    #table_id_2{
        border: 1px solid #111;
        margin-top: 20px;
    }

    #table_id_2 th {
        
        width: 75.2812px;
        background-color: #222;

        
        
    }

    #table_id_2 .icono-de-filtro-label
    {
        text-align: center;
        color: white !important;
    }

    #table_id_2 .icono-de-filtro-1
    {
        background-image: url(/images/icons/filtros_de_aire.png) !important;
        background-size: cover;
        height: 110px;
        width: 110px;
        margin: auto;
    }
    #table_id_2 .icono-de-filtro-2
    {
        background-image: url(/images/icons/filtros_de_aceite.png) !important;
        background-size: cover;
        height: 110px;
        width: 110px;
        margin: auto;
    }

    #table_id_2 .icono-de-filtro-3
    {
        background-image: url(/images/icons/filtros_de_gasolina.png) !important;
        background-size: cover;
        height: 110px;
        width: 110px;
        margin: auto;
    }

    #table_id_2_wrapper .icono-de-filtro-4
    {
        background-image: url(/images/icons/filtros_de_habitaculo.png) !important;
        background-size: cover;
        height: 110px;
        width: 110px;
        margin: auto;
    }

    #table_id_2 .icono-de-filtro-5
    {
        background-image: url(/images/icons/filtros_otros.png) !important;
        background-size: cover;
        height: 110px;
        width: 110px;
        margin: auto;
    }

    #table_id_2 .img-table
    {
        width: 200px;
    }

    #table_id_2 td {
        text-align: center;        
    }

    
</style>
@endsection