@extends('layouts.busqueda')
@section('page_title', 'Marcas')
@section('content')


<div class="p-b-10" style="margin-top:40px; margin-bottom: 40px;">
	<h3 class="ltext-105 cl5 txt-center respon1">

        Marcas

	</h3>
</div>


<div class="row isotope-grid" style="position: relative; height: 1717.38px; margin-bottom: 100px;">


@if(isset($marcas))


@foreach($marcas as $marca)

    <div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item" style="position: absolute; left: 0%; top: 0px;">



<div class="block1 wrap-pic-w" style="background-color: white;">
<img src="/images/marcas/{{ $marca->id}}/{{ $marca->id}}.jpg" alt="IMG-BANNER" style="margin-top: 90px;">
<a href="/marca/{{ $marca->id }}/modelos/aplicacion" class=" ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
{{ ucwords($marca->nombre) }}
</span>
<span class="block1-info stext-102 trans-04">
<!-- Spring 2018 -->
</span>
</div>

</a>
</div>

    </div>

    @endforeach

@endif

@if(count($marcas) == 0)
<div style="margin: auto; text-align: center;">
    <h3>
        No hay resultados
    </h3>
</div>
@endif


</div>


@endsection