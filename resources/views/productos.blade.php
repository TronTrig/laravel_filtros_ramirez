@extends('layouts.main')
@section('page_title', 'Productos')
@section('content')


<div class="sec-banner bg0 p-t-80 p-b-50 back-texture" >
<div class="container">

<div class="row">

<div class="col-md-6 col-xl-3 p-b-30 m-lr-auto">

<div class="block1 wrap-pic-w">
<img src="/images/productos/filtro.jpg" alt="IMG-BANNER">
<a href="/filtros/de-aceite" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Filtros De Aceite
</span>
<span class="block1-info stext-102 trans-04">
<!-- Spring 2018 -->
</span>
</div>

<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span></span>
</div>


<div class="block1-txt-child2 p-b-4 trans-05">
<div class="block1-link stext-101 cl0 trans-09">
Compra Ahora
</div>
</div>
</a>
</div>
</div>
<div class="col-md-6 col-xl-3 p-b-30 m-lr-auto">

<div class="block1 wrap-pic-w">
<img src="/images/productos/filtro-aire-wix.jpg" alt="IMG-BANNER">
<a href="/filtros/de-aire" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Filtros De Aire
</span>
<span class="block1-info stext-102 trans-04">
<!--Spring 2018 -->
</span>
</div>

<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span></span>
</div>


<div class="block1-txt-child2 p-b-4 trans-05">
<div class="block1-link stext-101 cl0 trans-09">
Compra Ahora
</div>
</div>
</a>
</div>
</div>
<div class="col-md-6 col-xl-3 p-b-30 m-lr-auto">

<div class="block1 wrap-pic-w">
<img src="/images/productos/filtro-combustible-wix.jpg" alt="IMG-BANNER">
<a href="/filtros/de-combustible" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Filtros De Combustible
</span>
<span class="block1-info stext-102 trans-04">
<!-- New Trend -->
</span>
</div>


<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span></span>
</div>

<div class="block1-txt-child2 p-b-4 trans-05">
<div class="block1-link stext-101 cl0 trans-09">
Compra Ahora
</div>
</div>
</a>
</div>
</div>

<div class="col-md-6 col-xl-3 p-b-30 m-lr-auto">

<div class="block1 wrap-pic-w">
<img src="/images/productos/kit-filtros.jpg" alt="IMG-BANNER">
<a href="/filtros/promocion-kit-filtros" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Promoción Kits De Filtros
</span>
<span class="block1-info stext-102 trans-04">
<!-- New Trend -->
</span>
</div>


<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span></span>
</div>

<div class="block1-txt-child2 p-b-4 trans-05">
<div class="block1-link stext-101 cl0 trans-09">
Compra Ahora
</div>
</div>
</a>
</div>
</div>





<!-- Fin de categorías -->
</div>
</div>
</div>


<div class="p-b-10">
	<h3 class="ltext-105 cl5 txt-center respon1">
		@php

			$u = explode('/',request()->path());
			$u = $u[0];


		@endphp
		@switch($u)
			@case("buscar")
				Resultado De Búsqueda
				@break
			@default
				Lista De Productos
				@break
		@endswitch

	</h3>
</div>
<div class="bg0 m-t-23 p-b-140 product-list-container">


	<section class="section-aside">
		
<aside class="asi-bck-categorias">

	<div class="asi-layout-categorias">
		<div class="asi-title">
			<div class="asi-title-categorias">
				Categorías <i class="fa fa-chevron-down"></i>
			</div>
		</div>
		<div class="cat-list">
			
		
		<div class="asi-categoria">
			<div class="asi-label" value="all">
				<a href="{{ url('') }}/productos">Todos</a> 
			</div>
		</div>
		<div class="asi-categoria">
			<div class="asi-label" value="featured">
				<a href="{{ url('') }}/promocionados">Promocionados</a> 
			</div>
		</div>
		<div class="asi-categoria">
			<div class="asi-label" value="best seller">
				<a href="{{ url('') }}/mas-vendidos">Más Vendidos</a> 
			</div>
		</div>

		
		<!-- categorias -->
		@foreach($categorias as $categoria)

		<div class="asi-categoria">
			<div class="asi-label" value="filters">
				<a href="{{ url('') }}/productos/{{ Str::slug($categoria->nombre) }}"> {{ ucwords($categoria->nombre) }}</a><i class="fa fa-chevron-down"></i>
			</div>
			<ul class="dropdown-subcategories">

				@foreach($categoria->subcategoria as $subcategoria)


				<li class="subcategorie">
					<a href="{{ url('') }}/productos/{{ Str::slug($categoria->nombre) }}/{{ Str::slug($subcategoria->nombre) }}">{{ucwords($subcategoria->nombre)}}</a>
				</li>

				@endforeach


			</ul>
		</div>
		@endforeach
		<!--- fin categorias -->
		</div>
	</div>
	
</aside>


</section>

<script type="text/javascript">
	$(function(){

		$(".asi-title-categorias").on("click", function(){
			$(".cat-list").toggle("slow");
		})

		$(".cat-list").on("click", ".fa.fa-chevron-down", function(){
			$(this).parent().parent().find(".dropdown-subcategories").toggle("slow");
		});

	});
</script>
<div class="container">



<div style="width: 100%;">
<!--
	<div class="bck-result-filter">
		<div class="result-filter-layout">
			<div class="result-filter-fieldset">
				<label>
					MOSTRAR:
				</label>
				<select>
					<option>
						12 Productos 
					</option>
					<option>
						18 Productos 
					</option>
					<option>
						24 Productos 
					</option>
					<option>
						30 Productos 
					</option>
				</select>
			</div>

			<div class="result-filter-fieldset">
				<label>
					ORDENAR POR:
				</label>
				<select>
					<option>
						Más Nuevos
					</option>
					<option>
						Más Vendidos
					</option>
					<option>
						De la A a la Z
					</option>
					<option>
						De la Z a la A
					</option>
					<option>
						Precio: Descendente
					</option>
					<option>
						Precio: Ascendente
					</option>

				</select>
			</div>
		</div>
	</div>

-->

<div class="row isotope-grid" style="position: relative; height: 1717.38px;">


@if(isset($productos))


@foreach($productos as $producto)

	<div class="col-sm-6 col-md-4 col-lg-4 p-b-35 isotope-item" style="position: absolute; left: 0%; top: 0px;">

	<div class="block2">
	<div class="block2-pic hov-img0">
	<img src="{{ url('') }}/images/productos/{{ $producto->id }}/1.jpg" alt="IMG-PRODUCT">
	<a href="{{ url('') }}/#" class="block2-btn flex-c-m stext-103 cl3 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" value="{{ $producto->id }}" files="{{ $producto->number_imgs }}"> 
	Vista Rápida
	</a>
	</div>
	<div class="block2-txt flex-w flex-t p-t-14">
	<div class="block2-txt-child1 flex-col-l ">
	<a href="{{ url('') }}/product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
	{{ $producto->nombre }}
	</a>
	<span class="stext-105 cl3">
	${{ $producto->precio }}
	</span>
	</div>
	<div class="block2-txt-child2 flex-r p-t-3">
	<a href="{{ url('') }}/#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
	<!-- <img class="icon-heart1 dis-block trans-04" src="{{ url('') }}/images/icons/xicon-heart-01.png.pagespeed.ic.kGwqiVk_BS.png" alt="ICON">
	<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ url('') }}/images/icons/xicon-heart-02.png.pagespeed.ic.-OFifoFj6L.png" alt="ICON">-->
	</a>
	</div>
	</div>
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
	
</div>
<!-- <div class="flex-c-m flex-w w-full p-t-45">
<a href="{{ url('') }}/#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
Load More
</a>
</div>-->
</div>
</div>

@endsection