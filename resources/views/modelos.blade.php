@extends('layouts.busqueda')
@section('page_title', 'Modelos')
@section('content')


<div class="p-b-10" style="margin-top:40px; margin-bottom: 40px;">
	<h3 class="ltext-105 cl5 txt-center respon1">

        Modelos

	</h3>
</div>


<div class="row">


@if(isset($modelos))


@foreach($modelos as $modelo)

    <div class="col-sm-6 col-md-4 col-lg-4 p-b-35 " >



<div class="block1 wrap-pic-w" style="background-color: white;">

<a href="/modelo/{{ $modelo->id }}/versiones" class="s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03">
<div class="block1-txt-child1 m-auto" >
<span class="block1-name ltext-102 trans-04 p-b-8" style="text-align: center;">
{{ ucwords($modelo->nombre) }}
</span>
</div>

</a>
</div>

    </div>

    @endforeach

@else

<div style="margin: auto; text-align: center;">
    <h3>
        No hay resultados
    </h3>
</div>
@endif

</div>


@endsection