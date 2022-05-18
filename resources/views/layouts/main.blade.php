<!DOCTYPE html>
<html lang="es">
<head>
<title>@yield('page_title')</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="{{ url('') }}/images/icons/favi.png">

<link rel="stylesheet" type="text/css" href="{{ url('') }}/A.vendor%2C%2C_bootstrap%2C%2C_css%2C%2C_bootstrap.min.css%20fonts%2C%2C_font-awesome-4.7.0%2C%2C_css%2C%2C_font-awesome.min.css%20fonts%2C%2C_iconic%2C%2C_css%2C%2C_material-design-iconic-font.min.css%20fonts%2C%2C_linearicons-v1.0.0%2C%2C_ic.css">


<script src="{{ url('') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
@php
//Determina el tipo css segun la segunda raiz de la url
	$u = explode('/',request()->path());
	$u = $u[0];

@endphp

@switch($u)

   @case('productos')
        
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/regular-pages.css">
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/productos.css">
        @break

   @case('buscar')
        
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/regular-pages.css">
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/productos.css">
        @break
  	@case('buscar-por-vehiculo')
        
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/regular-pages.css">
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/productos.css">
        @break

    @case('login')
        
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/regular-pages.css">
		<link rel="stylesheet" type="text/css" href="{{ url('') }}/login.css">
        @break

    @default
    	  <link rel="stylesheet" type="text/css" href="{{ url('') }}/index.css">

@endswitch





</head>
<body class="animsition" >

<header>

<div class="container-menu-desktop">

<div class="top-bar">
<div class="content-topbar flex-sb-m h-full container">
<div class="left-top-bar">

<span>
	<span class="llamanos-label">Llamanos a:</span> 
	<a href="tel:+584145974650" class="phone-number">+58 (414) 5974650</a>	
</span>
<span>
	<span class="redes-label">
		Redes:
	</span>
	<a rel="nofollow" href="https://wa.me/584144253264" target="_blank" class="fs-18  trans-04 m-r-16">
	<i class="fa fa-whatsapp"></i>
	</a>
	<a rel="nofollow" href="https://www.facebook.com/ventasfiltrosramirez" target="_blank" class="fs-18  trans-04 m-r-16">
	<i class="fa fa-facebook"></i>
	</a>
	<a rel="nofollow" href="https://www.instagram.com/filtrosramirez/" target="_blank" class="fs-18  trans-04 m-r-16">
	<i class="fa fa-instagram"></i>
	</a>
	<a rel="nofollow" href="https://twitter.com/FiltrosRamirez" target="_blank" class="fs-18 trans-04 m-r-16">
	<i class="fa fa-twitter"></i>
	</a>
</span>
</div>
<div class="right-top-bar flex-w h-full">
<a href="{{ url('') }}/" class="flex-c-m p-lr-10 trans-04">
Inicio
</a>
<a href="{{ url('') }}/productos" class="flex-c-m p-lr-10 trans-04">
Productos
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04">
Carrito
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04">
Blog
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04">
Nosotros
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04">
Contacto
</a>

@auth
   <a href="{{ url('') }}/login" class="flex-c-m p-lr-10 trans-04 text-capitalize">
	{{ Auth::user() -> name;  }}
	</a>
		<form method="POST" action="{{ route('logout') }}">
                         @csrf
			<a href="{{ url('') }}/route('logout')"   onclick="event.preventDefault();
			   this.closest('form').submit();">                                          	
			      	{{ __('Cerrar Sesión') }}
			</a>
 	  </form>
@endauth
    
@guest
   <a href="{{ url('') }}/login" class="flex-c-m p-lr-10 trans-04">
	Ingresar
	</a>
	<a href="{{ url('') }}/register" class="flex-c-m p-lr-10 trans-04">
	Registrarse
	</a>
@endguest


</div>
</div>
</div>
<div class="wrap-menu-desktop bck-carb-fiber">
<nav class="limiter-menu-desktop container">

<a href="{{ url('') }}/" class="logo">
<img src="{{ url('') }}/images/icons/logo2.png" alt="IMG-LOGO">
</a>

<div class="menu-desktop">
 
<form id="search" name="search" action="/buscar" method="POST">
	@csrf
	<fieldset>
		<div class="si-layout">
			<div class="si-cat-back">
				<select id="search-category" name="search-category">

					<option value="todos">Todos</option>
					<option value="promocionados">Promociones</option>
					
					@foreach($categorias as $categoria)

					<option value="{{ $categoria->id }}">{{ ucwords($categoria->nombre) }}:</option>
						
						@foreach($categoria->subcategoria as $subcategoria)

						<option value="{{ $categoria->id }}|{{ $subcategoria->id }}">- {{ ucwords($subcategoria->nombre) }}</option>

						@endforeach
			
			<!--		<option value="lubricantes">Lubricantes:</option>
						<option value="lubricantes|de-motor">- De Motor</option>
						<option value="lubricantes|de-transfer">- De Transfer</option>
						<option value="lubricantes|mineral">- Mineral</option>
					<option value="cauchos">Cauchos</option>
						<option value="cauchos|cotidianos">- Cotidianos</option>
						<option value="cauchos|camiones">- Camiones</option>
						<option value="cauchos|todo-terreno">- Todo Terreno</option>
					<option value="repuestos">Repuestos</option>
						<option value="repuestos|de-motor">- De Motor</option>
						<option value="repuestos|electricos">- Eléctricos</option>
						<option value="repuestos|luces">- Luces</option>
			-->
					@endforeach 

				</select>
			</div>
			<input type="text" name="value-search" id="value-search" placeholder="Buscar un producto">
			<button type="submit">
				<div class="icon-header-item cl3 hov-cl1 trans-04 p-l-22 p-r-11">
				<i class="zmdi zmdi-search"></i>
				</div>
			</button>
				
		</div>
	</fieldset>
</form>

</div>

<div class="wrap-icon-header flex-w flex-r-m">

<div class="icon-header-item cl3 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="

@if( !empty(session('cart')))
{{ count(session('cart')) }}
@else
0
@endif

">
<i class="zmdi zmdi-shopping-cart"></i>
</div>
<a href="{{ url('') }}/#" class="dis-block icon-header-item cl3 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
<i class="zmdi zmdi-favorite-outline"></i>
</a>
</div>
</nav>
</div>
</div>

<div class="wrap-header-mobile bck-carb-fiber">

<div class="logo-mobile">
<a href="{{ url('') }}/index.html"><img src="{{ url('') }}/images/icons/logo2.png" alt="IMG-LOGO"></a>
</div>

<div class="wrap-icon-header flex-w flex-r-m m-r-15">
<div class="icon-header-item cl3 hov-cl1 trans-04 p-r-11 js-show-modal-search">
<i class="zmdi zmdi-search"></i>
</div>
<div class="icon-header-item cl3 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="


@if( !empty(session('cart')))
{{ count(session('cart')) }}
@else
0
@endif
">
<i class="zmdi zmdi-shopping-cart"></i>
</div>
<a href="{{ url('') }}/#" class="dis-block icon-header-item cl3 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
<i class="zmdi zmdi-favorite-outline"></i>
</a>
</div>

<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</div>
</div>

<div class="menu-mobile">
<ul class="topbar-mobile">
<li>
<div class="left-top-bar">

<span>
	<span class="llamanos-label">Llamanos a: </span> 
	<a href="tel:+584145974650">+58 (414) 5974650</a>	
</span>
<br>
<span>
	<span class="redes-label">Redes:
	</span>
	<a rel="nofollow" href="https://wa.me/584144253264" target="_blank" class="fs-18  trans-04 m-r-16">
	<i class="fa fa-whatsapp"></i>
	</a>
	<a rel="nofollow" href="https://www.facebook.com/ventasfiltrosramirez" target="_blank" class="fs-18  trans-04 m-r-16">
	<i class="fa fa-facebook"></i>
	</a>
	<a rel="nofollow" href="https://www.instagram.com/filtrosramirez/" target="_blank" class="fs-18  trans-04 m-r-16">
	<i class="fa fa-instagram"></i>
	</a>
	<a rel="nofollow" href="https://twitter.com/FiltrosRamirez" target="_blank" class="fs-18 trans-04 m-r-16">
	<i class="fa fa-twitter"></i>
	</a>
</span>
</div>
</li>
<li>
<div class="right-top-bar flex-w h-full">
<a href="{{ url('') }}/" class="flex-c-m p-lr-10 trans-04 pc">
Inicio
</a>
<a href="{{ url('') }}/productos" class="flex-c-m p-lr-10 trans-04 pc">
Productos
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04 pc">
Carrito
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04 pc">
Blog
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04 pc">
Nosotros
</a>
<a href="{{ url('') }}/#" class="flex-c-m p-lr-10 trans-04 pc">
Contacto
</a>


@auth
   <a href="{{ url('') }}/login" class="flex-c-m p-lr-10 trans-04 text-capitalize">
	{{ Auth::user() -> name;  }}
	</a>
	<form method="POST" action="{{ route('logout') }}">
                         @csrf

			<a href="{{ url('') }}/route('logout')" class="flex-c-m p-lr-10 trans-04 text-capitalize" onclick="event.preventDefault();
			   this.closest('form').submit();">
			 	{{ __('Cerrar Sesión') }}
			</a>
 	  </form>
@endauth
    
@guest
	<a href="{{ url('') }}/login" class="flex-c-m p-lr-10 trans-04">
	Ingresar
	</a>
	<a href="{{ url('') }}/register" class="flex-c-m p-lr-10 trans-04">
	Registrarse
	</a>

@endguest
</div>
</li>
</ul>
<ul class="main-menu-m">
<li>
<a href="{{ url('') }}/">Inicio</a>
</li>
<li>
<a href="{{ url('') }}/productos">Productos</a>
</li>
<li>
<a href="{{ url('') }}/#">Carrito</a>
</li>
<li>
<a href="{{ url('') }}/#">Blog</a>
</li>
<li>
<a href="{{ url('') }}/#">Nosotros</a>
</li>
<li>
<a href="{{ url('') }}/#">Contacto</a>
</li>
</ul>
</div>

<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
<div class="container-search-header">
<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
<img src="{{ url('') }}/images/icons/xicon-close2.png.pagespeed.ic.If-SKafCx-.png" alt="CLOSE">
</button>

<form id="search" name="search"  class="search">
	<fieldset>
		<div class="si-layout">
			<div class="si-cat-back">
				<select id="search-category" name="search-category">
					<option value="todos">Todos</option>
					<option value="promocionados">Promociones</option>
					<option value="filtros">Filtros:</option>
						<option value="filtros|de-aire">- De Aire</option>
						<option value="filtros|de-gasolina">- De Gasolina</option>
						<option value="filtros|de-aceite">- De Aceite</option>
						<option value="filtros|promocion-kit-filtros">- Promoción Kit de Filtros </option>
						<option value="filtros|industrial">- Industriales</option>
					<option value="lubricantes">Lubricantes:</option>
						<option value="lubricantes|de-motor">- De Motor</option>
						<option value="lubricantes|de-transfer">- De Transfer</option>
						<option value="lubricantes|mineral">- Mineral</option>
					<option value="cauchos">Cauchos</option>
						<option value="cauchos|cotidianos">- Cotidianos</option>
						<option value="cauchos|camiones">- Camiones</option>
						<option value="cauchos|todo-terreno">- Todo Terreno</option>
					<option value="repuestos">Repuestos</option>
						<option value="repuestos|de-motor">- De Motor</option>
						<option value="repuestos|electricos">- Eléctricos</option>
						<option value="repuestos|luces">- Luces</option>
				</select>
			</div>
			<input type="text" name="mv-search" id="mv-search" placeholder="Buscar un producto">
			<button>
				<div class="icon-header-item cl3 hov-cl1 trans-04 p-l-22 p-r-11">
				<i class="zmdi zmdi-search"></i>
				</div>
			</button>
				
		</div>
	</fieldset>
</form>
</div>
</div>
</header>

<div class="wrap-header-cart js-panel-cart">
<div class="s-full js-hide-cart"></div>
<div class="header-cart flex-col-l p-l-65 p-r-25">
<div class="header-cart-title flex-w flex-sb-m p-b-8">
<span class="mtext-103 cl3">
Tu Carrito
</span>
<div class="fs-35 lh-10 cl3 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
<i class="zmdi zmdi-close"></i>
</div>
</div>
<div class="header-cart-content flex-w js-pscroll">
<ul class="header-cart-wrapitem w-full">


@php
	$total = 0 ;
@endphp
@if (session('cart'))

	@foreach(session('cart') as $id => $item)
		@php
			$total += $item['cantidad'] * $item['precio'];
		@endphp

		<li class="header-cart-item flex-w flex-t m-b-12">
		<div class="header-cart-item-img" value="{{$id}}">
		<img src="{{ url('') }}/images/productos/{{$id}}/{{$id}}.jpg" alt="IMG">
		</div>
		<div class="header-cart-item-txt p-t-8">
		<a href="{{ url('') }}/#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
		{{ $item['nombre'] }}
		</a>
		<span class="header-cart-item-info">
		{{ $item['cantidad'] }} x ${{ $item['precio'] }}
		</span>
		</div>
		</li>

	@endforeach

@endif


</ul>
<div class="w-full">
<div class="header-cart-total w-full p-tb-40">
Total: ${{ $total }}
@php
	unset($total);
@endphp


</div>
<div class="header-cart-buttons flex-w w-full">
<a href="{{ url('') }}/" class="no-display flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
Ver detallado
</a>
<a href="{{ url('') }}/" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
Comprar
</a>
</div>
</div>
</div>
</div>
</div>

<section class="section-slide">
<div class="wrap-slick1">
<div class="slick1">
<div class="item-slick1" style="background-image:url('{{ url('') }}/images/banner/fachada.jpeg')">
<div class="container h-full">
<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
<!-- <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
Bienvenidos
</h2> -->
</div>
<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0" style="text-align: center;
	 background-color: #a5c926;
    padding: 10px;
    border-radius: 4px;
    opacity: 0.2;
    max-width: 50%;
    text-align: center;
    margin: 0px auto;">
<span class="ltext-101 cl2  respon2">
<!-- Nuestra tienda online les facilitará conocer toda nuestra gama de productos automotrices al mejor precio del mercado.  -->
Ven, visitanos en la Urb. Industrial Castillito. 
</span>
</div>
<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
<!-- <a href="{{ url('') }}/#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
Compra Ahora 
</a>-->
</div>
</div>
</div>
</div>
<div class="item-slick1" style="background-image:url('{{ url('') }}/images/banner/wix-variedad.jpg'); background-size: cover;">
<div class="container h-full">
<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
<span class="ltext-101 cl2 respon2">
<!-- Texto para comentario en banner -->

</span>
</div>
<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
<!-- Texto para el titulo del banner -->
</h2>
</div>
<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
<!-- <a href="{{ url('') }}/#" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
Compra Ahora
</a> -->
</div>
</div>
</div>
</div>
<div class="item-slick1" style="background-image:url('{{ url('') }}/images/banner/sky-edited.png');background-size: cover; ">
<div class="container h-full">
<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
<span class="ltext-101 cl2 respon2">
<!-- Men Collection 2018 -->
</span>
</div>
<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
<!-- New arrivals -->
</h2>
</div>
<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
<!-- <a href="{{ url('') }}/product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
Compra Ahora
</a> -->
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="buscador-base bck-carb-fiber">
	<style type="text/css">

		@media screen and (min-width: 991px){

		
		.menu-buscadores{
         display: grid;
		   background-color: #a5c926;
		   border-radius: 4px 4px 0px 0px;
		   padding: 5px;
		   margin: auto;
		   width: 80%;
		   grid-template-columns: repeat(4, 1fr);
		       max-width: 1005px;
		}

		}

		@media screen and (max-width: 991px){

		
		.menu-buscadores{
         display: grid;
		   background-color: #a5c926;
		   border-radius: 4px 4px 0px 0px;
		   padding: 5px;
		   margin: auto;
		   width: 100%;
		}

		}

		.menu-buscadores-tab{
		    font-family: Poppins-Medium;
		    font-size: 20px;
		    color: #fff;
		    font-weight: 600;
		    /* padding: 5px; */
		    white-space: nowrap;
		    text-align: center;
		    display: inline-block;
		    padding: 20px;

		}

		.menu-buscadores-tab.active{
			color: #222;
		}

		.menu-buscadores-tab.non-active{
			background-color: #222;

		}
	</style>
	<div class="menu-buscadores"> 
		<div class="menu-buscadores-tab active d-flex">
			<div class="text-uppercase m-auto"> 
				Aplicaciones
			</div>
		</div>
		<div class="menu-buscadores-tab non-active d-flex">
			<div class="text-uppercase m-auto">
				Medidas
			</div>
		</div>
		<div class="menu-buscadores-tab non-active d-flex">
			<div class="text-uppercase m-auto">
				Nuevos Filtros <br>Y Aplicaciones
			</div>
		</div>
		<div class="menu-buscadores-tab non-active d-flex">
			<div class="text-uppercase m-auto">
				Filtros Especiales
			</div>
		</div>
	</div>
	<div class="buscador-layout">
		
		
		<form class="buscador-filtro" id="buscador-filtro" action="/buscar-por-vehiculo" method="POST">

			@csrf
			<div class="d-flex justify-content-between w-100 buscador-filtro-wrap-inside">
				<div class="w-100 d-flex justify-content-center align-items-center p-r-25">
					<label class="bf-label title text-uppercase">Buscar Filtro</label>
				</div>
				<div class="wrap-radio-icons-wrap">
					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="automóviles ligeros">
						<div class="radio-icon-1">
							
						</div>
						<label class="text-uppercase">
								Automóviles Ligeros
						</label>
					</div>
					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="camiones y autobuses">
						<div class="radio-icon-2">
							
						</div>
						<label class="text-uppercase">
								Camiones y Autobuses
						</label>
					</div>

					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="vehículos pesados y máquinas">
						<div class="radio-icon-3">
							
						</div>
						<label class="text-uppercase">
								Vehículos Pesados y Máquinas
						</label>
					</div>

					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="agrícolas">
						<div class="radio-icon-4">
							
						</div>
						<label class="text-uppercase">
								Agrícolas
						</label>
					</div>

					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="marinos">
						<div class="radio-icon-5">
							
						</div>
						<label class="text-uppercase">
								Marinos
						</label>
					</div>

					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="otros vehículos y máquinas">
						<div class="radio-icon-6">
							
						</div>
						<label class="text-uppercase">
								Otros Vehículos y Máquinas
						</label>
					</div>

					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="motocicletas">
						<div class="radio-icon-7">
							
						</div>
						<label class="text-uppercase">
								Motocicletas
						</label>
					</div>

					<div class="radio-icons-wrap">
						<input type="radio" name="bf-tipo" value="quads">
						<div class="radio-icon-8">
							
						</div>
						<label class="text-uppercase">
								Quads
						</label>
					</div>
				</div>
			</div>

			<script type="text/javascript">
				$(function(){

					$('.buscador-filtro').find('[name=bf-tipo]').on('click', function(e){


						$.ajax({
							url: '/tipos/'+$(this).val()+'/marcas',
							method: 'GET',
							data: {

							},
							success: function(response){
								

									$('#bf-modelo').attr('value', 0);
									$('#bf-modelo').parent().find('.bf-select').html('Seleccione un Modelo <i class="fa fa-chevron-down"></i>');

									$('#bf-marca').attr('value', 0);
									$('#bf-marca').parent().find('.bf-select').html('Seleccione una Marca  <i class="fa fa-chevron-down"></i>');

									drop_down = $('#drop-down-marca').find('ul');

									ul_content = '';

									
									$.each(response['marcas'], function(key, value){
										ul_content += '<li class="li-marca"><span class="drop-li-marca" field="bf-marca" value="'+value["id"]+'" style="text-transform:capitalize;">'+value["nombre"]+'</span></li>';

									//	console.log(value);
									});

									if (response['marcas'].length == 0) {
										console.log(response['marcas'].length );
										ul_content += '<li class="li-marca"><span class="drop-li-marca" field="bf-marca"  style="text-transform:capitalize;">Sin Marcas</span></li>';
									}

											

								drop_down.html(ul_content);
							}
						});
					});

					$('.buscador-filtro ').find('.radio-icons-wrap').on('click', function(e){
						e.stopPropagation();

						$('.buscador-filtro ').find('.radio-icons-wrap div').removeClass('active');
						$('.buscador-filtro ').find('.radio-icons-wrap label').css('color', '#666');

						var input = $(this).find('input');
						input.attr('checked', 'checked');
						input.trigger('click');
						input.siblings().first().addClass('active');
						input.siblings('label').css('color', 'white');
						
					});

					$('.buscador-filtro ').find('.radio-icons-wrap input').on('click', function(e){
						e.stopPropagation();
					});


				});
			</script>
			
		<div class="w-100 buscador-filtro-wrap-fieldset">


			
			<fieldset id="field-codigo">
				<input type="text" name="bf-codigo" id="bf-codigo" placeholder=" Introducir Referencia Del Filtro" style="" class="text-uppercase">
			</fieldset>

			<div class="d-flex"> 
				<div class="bf-label text-capitalize" style="margin:auto;">
					O
				</div>
			</div>


			<fieldset id="field-marca">
				<div class="bf-select text-uppercase">
					Seleccione una Marca <i class="fa fa-chevron-down"></i>
				</div>
				<input type="text" name="bf-marca" id="bf-marca" value="0">
				<div class="drop-down no-display" id="drop-down-marca">
					<ul>

						<li class="li-marca">
							<span class="drop-li-marca text-uppercase" field="bf-marca" value="0">	
								SIN MARCA
							</span>
						</li>


					</ul>
				</div>
			</fieldset>
			<fieldset>
				<div class="bf-select text-uppercase">
					Seleccione un Modelo <i class="fa fa-chevron-down"></i>
				</div>
				<input type="text" name="bf-modelo" id="bf-modelo" value="0">
				<div class="drop-down no-display" id="drop-down-modelo">
					<ul>
						<li>
							<span class="drop-li-marca text-uppercase" field="bf-modelo" value="0">
								Sin modelo
							</span>
						</li>
					</ul>
				</div>
			</fieldset>


			

			
			<div class="bf-b-layout">
				<button class="bf-button">
					Buscar
				</button>
			</div>
		</div>

		</form>
	</div>	
</div>

<script type="text/javascript">


	$(function(){
		// THIS MAKE SEARCH SELECT'S DROPS DOWN TOOGLE
		$('.buscador-filtro ').on('click', 'fieldset', function(){

			$.each($('.buscador-filtro .drop-down'), function(key, element){
				$(element).css('display', 'none');
			});

			$(this).find('.drop-down').toggle();
			
			
		});

		$('.buscador-filtro').on('click', 'li', function(e){
			e.stopPropagation();
			// Change selected option on custom select

			let parent = $(this).parent().parent().parent();
			let select = parent.find('.bf-select');
			select.html($(this).text() + ' <i class="fa fa-chevron-down"></i>');

			let select_option = $(this).find('span');
			//Get the select to change text
			let select_target = select_option.attr('field');
			//Get the value to change selects' text
			let option_value = select_option.attr('value');
			//Set select's text
		//	console.log(select_target);
			$('#'+select_target).attr('value', option_value);

			parent.find('.drop-down').toggle();
			//console.log(parent.find('.drop-down'));

			if ($(this).attr('class') == 'li-marca') {
			//	console.log('Li Marca');
				busca = 'modelos';
				desde = 'marcas';
			}

			if ($(this).attr('class') == 'li-modelo') {
			//	console.log('Li Modelo');
				return '';
			}


			$.ajax({

				url: '/'+desde+'/'+option_value+'/'+busca,
				method: 'GET',
				data: {

				},
				success: function(response){
					//console.log(response);

					

					if (busca == 'modelos') {

						//console.log($('#bf-modelo').val('Modelo'));
						//console.log($('#bf-modelo').parent().find('.bf-select').html('Modelo <i class="fa fa-chevron-down"></i>'));

						$('#bf-modelo').attr('value', 0);
						$('#bf-modelo').parent().find('.bf-select').html('Seleccione un Modelo <i class="fa fa-chevron-down"></i>');

						$('#bf-ano').attr('value', 0);
						$('#bf-ano').parent().find('.bf-select').html('Año <i class="fa fa-chevron-down"></i>');

						$('#bf-version').attr('value', 0);
						$('#bf-version').parent().find('.bf-select').html('Versión <i class="fa fa-chevron-down"></i>');


					
						drop_down = $('#drop-down-modelo').find('ul');

						ul_content = '';

						$.each(response['modelos'], function(key, value){
							ul_content += '<li class="li-modelo"><span class="drop-li-marca" field="bf-modelo" value="'+value["id"]+'" style="text-transform:capitalize;">'+value["nombre"]+'</span></li>';

						//	console.log(value);
						});

					}				

					drop_down.html(ul_content);
				}


			});


		});
	});
</script>


	@yield('content')


<footer class="p-t-75 p-b-32 bck-carb-fiber">
<div class="container">
<div class="row">
<div class="col-sm-6 col-lg-4 p-b-50">
<h4 class="  p-b-30">
Categorías
</h4>
<ul>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
Filtros
</a>
</li>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
Lubricantes
</a>
</li>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
Cauchos
</a>
</li>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
Repuestos
</a>
</li>
</ul>
</div>
<div class="col-sm-6 col-lg-4 p-b-50">
<h4 class="  p-b-30">
Ayuda
</h4>
<ul>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
Pedidos
</a>
</li>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
Envios
</a>
</li>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
Devoluciones
</a>
</li>
<li class="p-b-10">
<a href="{{ url('') }}/#" class="footer-menu-text hov-cl1 trans-04">
FAQs
</a>
</li>
</ul>

<h4 class="  p-b-30 p-t-30">
Administración
</h4>
<ul>
	<li class="p-b-10">
		<a href="/login" class="footer-menu-text hov-cl1 trans-04">
		Panel
		</a>
	</li>	
</ul>
</div>
<div class="col-sm-6 col-lg-4 p-b-50">
<h4 class="  p-b-30">
Ponte En Contacto
</h4>
<p class="footer-contact-text size-201">
Alguna pregunta? Dejanos saber a través de nuestro numero <a href="tel:+584145974650">+58 (414) 5974650</a>. Más información en nuestra página de <a href="{{ url('') }}/#">contacto</a>.
</p>
<br>
<p class="footer-contact-text size-201">
Estamos ubicados en Urb. Industrial Castillito.
Edif. Filtros Ramírez, local parcela L-34, en la Av. 101
San Diego Edo. Carabobo
</p>
<div class="p-t-27">
<a rel="nofollow" href="https://wa.me/584144253264" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
<i class="fa fa-whatsapp"></i>
</a>
<a rel="nofollow" href="https://www.facebook.com/ventasfiltrosramirez" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
<i class="fa fa-facebook"></i>
</a>
<a rel="nofollow" href="https://www.instagram.com/filtrosramirez/" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
<i class="fa fa-instagram"></i>
</a>
<a rel="nofollow" href="https://twitter.com/FiltrosRamirez" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
<i class="fa fa-twitter"></i>
</a>

</div>
</div>

</div>
<div class="">

<p class="footer-contact-text txt-center">

Copyright &copy;<script>document.write(new Date().getFullYear());</script> Filtros Ramirez. All rights reserved</a>

</p>
</div>
</div>
</footer>

<div class="fixed-social-icons">
	<div class="social-icons-layout">
		<div class="social-icon">
			<a rel="nofollow" href="https://wa.me/584144253264" target="_blank" class="fs-18  hov-cl1 trans-04 m-r-16">
			<i class="fa fa-whatsapp"></i>
			</a>
		</div>
		<div class="social-icon">

			<a rel="nofollow" href="https://www.facebook.com/ventasfiltrosramirez" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
			<i class="fa fa-facebook"></i>
			</a>
			
		</div>
		<div class="social-icon">
			<a rel="nofollow" href="https://www.instagram.com/filtrosramirez/" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
			<i class="fa fa-instagram"></i>
			</a>
		</div>
		<div class="social-icon">

			<a rel="nofollow" href="https://twitter.com/FiltrosRamirez" target="_blank" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
			<i class="fa fa-twitter"></i>
			</a>
			
		</div>
	</div>
</div>

<div class="fixed-car-mobil">
	<div class="car-movil">
		<div class="icon-header-item cl3 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart" data-notify="0">
		<i class="zmdi zmdi-shopping-cart"></i>
		</div>
	</div>
</div>		

<div class="btn-back-to-top" id="myBtn">
<span class="symbol-btn-back-to-top">
<i class="zmdi zmdi-chevron-up"></i>
</span>
</div>





<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
<div class="overlay-modal1 js-hide-modal1"></div>
<div class="container">
<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
<button class="how-pos3 hov3 trans-04 js-hide-modal1">
<img src="{{ url('') }}/images/icons/xicon-close.png.pagespeed.ic.SLEmNY6YK3.png" alt="CLOSE">
</button>
<div class="row">
	<div class="col-md-6 col-lg-7 p-b-30">
		<div class="p-l-25 p-r-30 p-lr-0-lg">
			<div class="wrap-slick3 flex-sb flex-w">

				<div class="wrap-slick3-dots"></div>
				<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
				
				<div class="slick3 gallery-lb">
					


					<div
					 class="item-slick3" id="modal-item1-thumb" data-thumb="images/productos/lubricante.jpg">	<div class="wrap-pic-w pos-relative">
							<img id="modal-item1-img" src="{{ url('') }}/images/productos/lubricante.jpg" alt="IMG-PRODUCT">
							<a id="modal-item1-href" class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('') }}/images/productos/lubricante.jpg">
							<i class="fa fa-expand"></i>
							</a>
						</div>
					</div>



					<div class="item-slick3" id="modal-item2-thumb" data-thumb="images/productos/lubricante.jpg">
						<div class="wrap-pic-w pos-relative">
						<img id="modal-item2-img" src="{{ url('') }}/images/productos/lubricante.jpg" alt="IMG-PRODUCT">
						<a id="modal-item2-href" class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('') }}/images/productos/lubricante.jpg">
						<i class="fa fa-expand"></i>
						</a>
						</div>
					</div>


					<div class="item-slick3" id="modal-item3-thumb" data-thumb="images/productos/lubricante.jpg">
						<div class="wrap-pic-w pos-relative">
							<img id="modal-item3-img" src="{{ url('') }}/images/productos/lubricante.jpg" alt="IMG-PRODUCT">
							<a id="modal-item3-href" class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('') }}/images/productos/lubricante.jpg">
							<i class="fa fa-expand"></i>
							</a>
						</div>
					</div>

					<div class="item-slick3" id="modal-item4-thumb" data-thumb="images/productos/lubricante.jpg">
						<div class="wrap-pic-w pos-relative">
							<img id="modal-item4-img" src="{{ url('') }}/images/productos/lubricante.jpg" alt="IMG-PRODUCT">
							<a id="modal-item4-href" class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('') }}/images/productos/lubricante.jpg">
							<i class="fa fa-expand"></i>
							</a>
						</div>
					</div>

					<div class="item-slick3" id="modal-item5-thumb" data-thumb="images/productos/lubricante.jpg">
						<div class="wrap-pic-w pos-relative">
							<img id="modal-item5-img" src="{{ url('') }}/images/productos/lubricante.jpg" alt="IMG-PRODUCT">
							<a id="modal-item5-href" class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('') }}/images/productos/lubricante.jpg">
							<i class="fa fa-expand"></i>
							</a>
						</div>
					</div>

					<div class="item-slick3" id="modal-item6-thumb" data-thumb="images/productos/lubricante.jpg">
						<div class="wrap-pic-w pos-relative">
							<img id="modal-item6-img" src="{{ url('') }}/images/productos/lubricante.jpg" alt="IMG-PRODUCT">
							<a id="modal-item6-href" class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('') }}/images/productos/lubricante.jpg">
							<i class="fa fa-expand"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-5 p-b-30">
		<div class="p-r-50 p-t-5 p-lr-0-lg">
			<h4 class="mtext-105 cl3 js-name-detail p-b-14" id="modal-nombre">
			Lubricantes SKY ALTO-KILOMETRAJE-25W60
			</h4>
			<span class="mtext-106 cl2" id="modal-precio">
			$58.79
			</span>
			<p class="stext-102 cl3 p-t-23" id="modal-descripcion">
			Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
			</p>

			<div class="p-t-33">


				<div class="flex-w flex-r-m p-b-10">
					<div class="size-204 flex-w flex-m respon6-next">
						<div class="wrap-num-product flex-w m-r-20 m-tb-10">
							<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
								<i class="fs-16 zmdi zmdi-minus"></i>
							</div>
							<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="modal-cantidad" value="1">
							<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
								<i class="fs-16 zmdi zmdi-plus"></i>
							</div>
						</div>
						<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="modal-add-cart" value="">
						Añadir al carrito
						</button>
					</div>
				</div>
			</div>

			<div class="flex-w flex-m p-l-100 p-t-40 respon7">
				<div class="flex-m bor9 p-r-10 m-r-11">
					<a href="{{ url('') }}/#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Añadir a la lista de deseos">
					<i class="zmdi zmdi-favorite"></i>
				</a>
				</div>
				<a href="{{ url('') }}/#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
				<i class="fa fa-facebook"></i>
				</a>
				<a href="{{ url('') }}/#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
				<i class="fa fa-twitter"></i>
				</a>
				<a href="{{ url('') }}/#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
				<i class="fa fa-google-plus"></i>
				</a>



			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">

	$modal = $('.overlay-modal1.js-hide-modal1').clone();
	$( function(){
    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();

      //  console.log($(this).attr('value'));
        data = $(this).attr('value');
        number_imgs = $(this).attr('files');
        $.ajax({

        		url: '{{ url('') }}/producto/'+data,
        		type: 'GET',
        		data: {
        			'for':'modal'
        		},
        		success: function(response)
        		{	

        			// console.log(response['id']);
     			 	base_url_img = '{{ url('') }}/images/productos/'+response['id']+'/'+response['id']+'.jpg';

     			 	hay = 0;
     			 	var thumbs = $(".wrap-slick3-dots").find("li"); 

        			for (var i = 1; i <= number_imgs; i++) {
        				base_url_img = '/images/productos/'+response['id']+'/'+i+'.jpg';
        			//console.log(i);
        				hay++;
        				//$("#modal-item"+i+"-thumb").css('display', 'block');
        				
        				$("#modal-item"+i+"-thumb").attr('data-thumb', base_url_img);
	        			$("#modal-item"+i+"-img").attr('src', base_url_img);
	        			$("#modal-item"+i+"-img").parent().parent().attr('data-thumb', base_url_img)
	        			$("#modal-item"+i+"-href").attr('href', base_url_img);

	        			$(thumbs[i-1]).find('img').attr('src', base_url_img);
	        			console.log("faltan: "+hay);
        			}

        			for (var i = hay; i <= 6; i++) {
        				console.log('quedan: '+i);
        				
        				base_url_img = '{{ url('') }}/images/icons/favi.png';
        			//	$("#modal-item"+i+"-thumb").css('display', 'none');
        				$("#modal-item"+i+"-thumb").attr('data-thumb', base_url_img);
	        			$("#modal-item"+i+"-img").attr('src', base_url_img);
	        			$("#modal-item"+i+"-href").attr('href', base_url_img);
	        			$("#modal-item"+i+"-img").parent().parent().attr('data-thumb', base_url_img);
	        			$(thumbs[i]).find('img').attr('src', base_url_img);
        				
        			}
        			
        			
     				
/*
        			$("#modal-item1-thumb").attr('data-thumb', base_url_img);
        			$("#modal-item1-img").attr('src', base_url_img);
        			$("#modal-item1-href").attr('href', base_url_img);

        			$("#modal-item2-thumb").attr('data-thumb', base_url_img);
        			$("#modal-item2-img").attr('src', base_url_img);
        			$("#modal-item2-href").attr('href', base_url_img);

        			$("#modal-item3-thumb").attr('data-thumb', base_url_img);
        			$("#modal-item3-img").attr('src', base_url_img);
        			$("#modal-item3-href").attr('href', base_url_img);*/

 					$("#modal-nombre").text(response['nombre']);
 					$("#modal-precio").text(response['precio']);
 					$("#modal-descripcion").text(response['descripcion']);   
 					$("#modal-add-cart ").attr('value', response['id']); 

 					var thumbs = $(".wrap-slick3-dots").find("li");   			
        					 
        			for (var i = thumbs.length - 1; i >= 0; i--) {
        				
        				//console.log(thumbs[i]);

        				//$(thumbs[i]).find('img').attr('src', base_url_img);
        			}
        		}

        	});
    

        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });

    $('#modal-add-cart').on('click', function(){


    

    });

	} );
</script>






<script src="{{ url('') }}/vendor/animsition%2C_js%2C_animsition.min.js%20bootstrap%2C_js%2C_popper.js.pagespeed.jc.ED2vGulZGz.js"></script><script>eval(mod_pagespeed_8JawVzd5Oy);</script>

<script>eval(mod_pagespeed_$PacBXQ5pm);</script>
<script src="{{ url('') }}/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="{{ url('') }}/vendor/select2/select2.min.js"></script>
<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>

<script src="{{ url('') }}/vendor/daterangepicker/moment.min.js"></script>
<script src="{{ url('') }}/vendor/daterangepicker/daterangepicker.js"></script>

<script src="{{ url('') }}/vendor%2C_slick%2C_slick.min.js%20js%2C_slick-custom.js%20vendor%2C_parallax100%2C_parallax100.js.pagespeed.jc.gjiX9dX1GK.js"></script><script>eval(mod_pagespeed_Z6dhgItSiH);</script>
<script>eval(mod_pagespeed_jjvC8YlSkl);</script>

<script>eval(mod_pagespeed_Uv866_6dUG);</script>
<script>
        $('.parallax100').parallax100();
	</script>

<script src="{{ url('') }}/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>

<script src="{{ url('') }}/vendor/isotope%2C_isotope.pkgd.min.js%20sweetalert%2C_sweetalert.min.js.pagespeed.jc.4v0LQHF1JD.js"></script><script>eval(mod_pagespeed_9syktgbIeO);</script>

<script>eval(mod_pagespeed_i148H$vDXF);</script>
<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "Añadido a la lista de deseos!", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "Añadido a la lista de deseos!", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/


		function set_top_cart_content(cart_items){

			 var cart_item_layout = '';
	        			 var total = 0;
	        			 var num_items = 0;

						$.each(cart_items, function(id,item) {
							 //Create content for car
						  	total += item['cantidad'] * item['precio'];
						  	num_items += 1;

		        			
		        			 cart_item_layout += '<li class="header-cart-item flex-w flex-t m-b-12"><div class="header-cart-item-img" value="'+item['id']+'">';

		        			 let item_img = '<img src="{{ url('') }}/images/productos/'+item['id']+'/'+item['id']+'.jpg" alt="IMG">';

		        			 cart_item_layout += item_img;
		        			 cart_item_layout += '</div><div class="header-cart-item-txt p-t-8">';

		        			 let item_name = '<a href="{{ url('') }}/producto/'+item['id']+'" class="header-cart-item-name m-b-18 hov-cl1 trans-04">'+item['nombre']+'</a>';


		        			 cart_item_layout += item_name;

		        			let item_price =	'<span class="header-cart-item-info">'+item['cantidad']+' x $'+item['precio']+'</span>';

		        			cart_item_layout += item_price;

		        			 cart_item_layout += '</div></li>';


						}); 

						//Add to top cart	
	        			 $(".header-cart-wrapitem").html(cart_item_layout);

	        			 $(".header-cart-total").html('Total: $'+total);

	        			 $(".car-movil .icon-header-item").attr('data-notify', num_items);
	        			 
	        			 $(".wrap-icon-header .icon-header-noti.js-show-cart").attr('data-notify', num_items);
	        			 

		}

		/*---------------------------------------------*/
		$('.js-addcart-detail').each(function(){
			
			$(this).on('click', function(){

				var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
	       // console.log($(this).attr('value'));
	        data = $(this).attr('value');

	        $.ajax({

	        		url: '{{ url('') }}/add-to-cart/'+data,
	        		type: 'GET',
	        		data: {
	        			'for':'top-car',
	        			'cantidad': $('#modal-cantidad').val()

	        		},
	        		success: function(response)
	        		{	

	        			$(".swal-title").html(response['added']['nombre']);
	        			 console.log(response);
	        			 swal(nameProduct, " Añadido al carrito!", "success");	 
	        			 $(".js-hide-modal1").trigger("click");
	        			 $('#modal-cantidad').val(1);

	        			 set_top_cart_content(response['cart']);
	        		}

	        	});
				
			});
		});


		$('.header-cart-wrapitem').on('click','.header-cart-item-img', function(){
	        data = $(this).attr('value');
	        
	        $.ajax({

	        		url: '/remove-from-cart/'+data,
	        		type: 'GET',
	        		data: {
	        			'for':'top-car'

	        		},
	        		success: function(response)
	        		{	
	        			// console.log(response);
	        			 set_top_cart_content(response['cart']);
	        		}

	        	});
		});
	
	</script>

<script src="{{ url('') }}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>

<script src="{{ url('') }}/js/main.js"></script>

</body>

</html>