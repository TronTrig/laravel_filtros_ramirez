@extends('layouts.main')
@section('page_title', 'Inicio')
@section('content')




<div class="sec-banner bg0 p-t-80 p-b-50 back-texture" >
<div class="container">
	<div class="p-b-10">
	<h3 class="ltext-105 cl5 txt-center respon1">
	Categorías Destacadas
	</h3>
	</div>
<div class="row">

<div class="col-md-6 col-xl-3 p-b-30 m-lr-auto">

<div class="block1 wrap-pic-w">
<img src="images/productos/filtro.jpg" alt="IMG-BANNER">
<a href="/productos/filtros" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Filtros
</span>
<span class="block1-info stext-102 trans-04">
<!-- Spring 2018 -->
</span>
</div>

<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span>Los Filtros son considerados como uno de los elementos más esenciales, ya que sin éste el funcionamiento del motor no sería el correcto.</span>
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
<img src="images/productos/lubricante.jpg" alt="IMG-BANNER">
<a href="/productos/lubricantes" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Lubricantes
</span>
<span class="block1-info stext-102 trans-04">
<!--Spring 2018 -->
</span>
</div>

<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span>Los Lubricantes evitan el desgaste entre dos piezas en movimiento. Es fundamental para un buen funcionamiento del vehículo.</span>
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
<img src="images/productos/caucho.png" alt="IMG-BANNER">
<a href="/productos/cauchos" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Cauchos
</span>
<span class="block1-info stext-102 trans-04">
<!-- New Trend -->
</span>
</div>


<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span>Los Cauchos permiten un contacto adecuado con el pavimento, posibilitando el arranque, el frenado, buena conducción y amortiguar la marcha de un vehículo.</span>
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
<img src="/images/productos/faro-trasero.png" alt="IMG-BANNER">
<a href="/productos/repuestos" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
Repuestos
</span>
<span class="block1-info stext-102 trans-04">
<!-- New Trend -->
</span>
</div>


<div class="block1-txt-child2 p-b-4 trans-05 sec-banner-descriptions">
	<span>Repuestos para tu vehiculo.</span>
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


<section class="sec-product bg0 p-t-10 p-b-50 back-texture">
<div class="container">
<div class="p-b-32">
<h3 class="ltext-105 cl5 txt-center respon1">
Productos Destacados

</h3>
</div>

<div class="tab01">

<ul class="nav nav-tabs" role="tablist">
<li class="nav-item p-b-10">
<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Más vendidos</a>
</li>
<li class="nav-item p-b-10">
<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Promocionados</a>
</li>
</ul>

<div class="tab-content p-t-50">

<div class="tab-pane fade show active" id="best-seller" role="tabpanel">

<div class="wrap-slick2">
<div class="slick2">





@foreach ($mas_vendidos as $vendido)

<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

<div class="block2">
<div class="block2-pic hov-img0">
<img src="/images/productos/{{ $vendido->id }}/1.jpg" alt="IMG-PRODUCT">
<a href="#" class="block2-btn flex-c-m stext-103 cl3 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" value="{{ $vendido->id }}" files="{{ $vendido->number_imgs }}">
Vista Rápida
</a>
</div>
<div class="block2-txt flex-w flex-t p-t-14">
<div class="block2-txt-child1 flex-col-l ">
<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
{{ $vendido->nombre }}
</a>
<span class="stext-105 cl3">
${{ $vendido->precio }}
</span>
</div>
<div class="block2-txt-child2 flex-r p-t-3">
<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
<!-- <img class="icon-heart1 dis-block trans-04" src="images/icons/xicon-heart-01.png.pagespeed.ic.kGwqiVk_BS.png" alt="ICON">
<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/xicon-heart-02.png.pagespeed.ic.-OFifoFj6L.png" alt="ICON"> -->
</a>
</div>
</div>
</div>
</div>

@endforeach


</div>
</div>
</div>

<div class="tab-pane fade" id="featured" role="tabpanel">

<div class="wrap-slick2">
<div class="slick2">

@foreach ($promocionados as $promocionado)



<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">

	<div class="block2">
		<div class="block2-pic hov-img0">
			<img src="images/productos/{{ $promocionado->id }}/1.jpg" alt="IMG-PRODUCT">
			<a href="#" class="block2-btn flex-c-m stext-103 cl3 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" value="{{ $promocionado->id }}" files="{{ $promocionado->number_imgs }}">
			Vista Rápida
			</a>
		</div>
		<div class="block2-txt flex-w flex-t p-t-14">
			<div class="block2-txt-child1 flex-col-l ">
				<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
				{{ $promocionado->nombre }}
				</a>
				<span class="stext-105 cl3">
				${{ $promocionado->precio }}
				</span>
			</div>
			<div class="block2-txt-child2 flex-r p-t-3">
				<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
				<img class="icon-heart1 dis-block trans-04" src="images/icons/xicon-heart-01.png.pagespeed.ic.kGwqiVk_BS.png" alt="ICON">
				<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/xicon-heart-02.png.pagespeed.ic.-OFifoFj6L.png" alt="ICON">
				</a>
			</div>
		</div>
	</div>
</div>

@endforeach



</div>
</div>
</div>

<!-- aAAAAAAAAAAAAAAAAA -->


</div>
</div>
</div>
</section>













<section class="sec-product bg0 p-t-10 p-b-50 back-texture">
<div class="container">
<div class="p-b-32">
<h3 class="ltext-105 cl5 txt-center respon1">
	Aplicaciones
</h3>
</div>




<div class="tab01">

<ul class="nav nav-tabs" role="tablist">
<li class="nav-item p-b-10">
<a class="nav-link active" data-toggle="tab" href="#aplicaciones" role="tab" style="display: none;">Aplicaciones</a>
</li>
</ul>

<div class="tab-content p-t-50">

<div class="tab-pane fade show active" id="aplicaciones" role="tabpanel">

<div class="wrap-slick2">
<div class="slick2">

@foreach ($tipos as $tipo)

<div class="col-md-6 col-xl-3 p-b-30 m-lr-auto">

<div class="block1 wrap-pic-w" style="background-color: white;">
<img src="images/icons/buscador/{{ $tipo['nombre_img']}}" alt="IMG-BANNER" style="margin-top: 90px;">
<a href="/tipo/{{ $tipo['nombre'] }}/marcas" class=" ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
<div class="block1-txt-child1 flex-col-l ctc-br">
<span class="block1-name ltext-102 trans-04 p-b-8">
{{ ucwords($tipo['nombre']) }}
</span>
<span class="block1-info stext-102 trans-04">
<!-- Spring 2018 -->
</span>
</div>

</a>
</div>
</div>

@endforeach


</div>
</div>
</div>



</div>
</div>
</div>
</section>
@endsection




