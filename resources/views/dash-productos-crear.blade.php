<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="display:flex; justify-content: center;">

                        @if(isset($producto))

                        <form method="POST" action="/dproductos/guardar/{{$producto->id}}" name="crear" enctype="multipart/form-data" id="crear">
                        @else
                        
                        <form method="POST" action="/dproductos" name="crear" enctype="multipart/form-data" id="crear">

                        @endif
                           @csrf

                            @if(isset($producto))

                            <div>
                                <x-label for="sku" class="label-form"  :value="__('SKU')" />

                                <x-input id="sku" class="input-form block mt-1 w-full" type="text" name="sku" :value="$producto->sku" required autofocus placeholder=""/>
                            </div>

                            @else
                            <div>
                                <x-label for="sku" class="label-form"  :value="__('SKU')" />

                                <x-input id="sku" class="input-form block mt-1 w-full" type="text" name="sku" :value="old('sku')" required autofocus placeholder=""/>
                            </div>
                            @endif

                             
                            @if(isset($producto))

                            <div>
                                <x-label for="id-sistema-administrativo" class="label-form"  :value="__('ID Sistema Administrativo')" />

                                <x-input id="id-sistema-administrativo" class="input-form block mt-1 w-full" type="text" name="id-sistema-administrativo" :value="$producto->id_sistema_administrativo" required autofocus placeholder=""/>
                            </div>

                            @else

                            <div>
                                <x-label for="id-sistema-administrativo" class="label-form"  :value="__('ID Sistema Administrativo')" />

                                <x-input id="id-sistema-administrativo" class="input-form block mt-1 w-full" type="text" name="id-sistema-administrativo" :value="old('id-sistema-administrativo')" required autofocus placeholder=""/>
                            </div>

                            @endif
                            
                            @if(isset($producto))

                            <div style="display:none;">
                                <x-label for="numero-parte" class="label-form"  :value="__('Numero de parte')" />

                                <x-input id="numero-parte" class="input-form block mt-1 w-full" type="text" name="numero-parte" :value="$producto->id_numero_parte" required autofocus placeholder=""/>
                            </div>

                            @else
                            
                            <div style="display:none;">
                                <x-label for="numero-parte" class="label-form"  :value="__('Numero de parte')" />

                                <x-input id="numero-parte" class="input-form block mt-1 w-full" type="text" name="numero-parte" :value="232" required autofocus placeholder=""/>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre del producto')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="$producto->nombre" required autofocus placeholder=""/>
                            </div>

                            @else

                              <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre del producto')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus placeholder=""/>
                            </div>

                            @endif


                            <div>
                                <x-label for="subcategoria" class="label-form"  :value="__('Subcategorias')" />
                                <select name="subcategoria" id="subcategoria">
                                    <option value="0"> Selecciona una Subcategoria</option>

                                    @foreach($subcategorias as $subcategoria)

                                        <option 

                                        @if(isset($producto))
                                            @if($producto->subcategoria->id == $subcategoria->id)

                                                selected

                                            @endif
                                        @endif

                                        value="{{ $subcategoria->id }}"> {{ ucwords($subcategoria->categoria->nombre) }} - {{ ucwords($subcategoria->nombre) }} </option>
                                    
                                    @endforeach
                                </select>
                            </div>
                             <div>
                                <x-label for="marca" class="label-form"  :value="__('Marcas')" />
                                <select name="marca" id="marca">
                                    <option value="0"> Selecciona una Marca</option>
                                    @foreach($marcas as $marca)

                                        <option 
                                        @if(isset($producto))
                                            @if($marca->id == $producto->marca->id)
                                                selected 
                                            @endif
                                        @endif

                                        value="{{ $marca->id }}"> {{ ucwords($marca->nombre) }} </option>
                                    
                                    @endforeach
                                </select>
                            </div>


                            @if(isset($producto))
                                <div>
                                <x-label for="modelo" class="label-form"  :value="__('Modelos')" />
                                    <select name="modelo" id="modelo">
                                        <option value="0"> Selecciona un Modelo</option>
                                        @foreach($modelos as $modelo)

                                            <option 
                                            @if(isset($producto))
                                                @if($modelo->id == $producto->modelo->id)
                                                    selected 
                                                @endif
                                            @endif

                                            value="{{ $modelo->id }}"> {{ ucwords($modelo->nombre) }} </option>
                                    
                                         @endforeach
                                    </select>
                                </div>
                            @else
                            <div>
                                <x-label for="modelo" class="label-form"  :value="__('Modelos')" />
                                <select name="modelo" id="modelo">
                                    <option value="0"> Selecciona un Modelo</option>

                                </select>
                            </div>
                            @endif

                            @if(isset($producto))
                            <div>
                                <x-label for="ano" class="label-form"  :value="__('Años')" />
                                <select name="ano" id="ano">
                                    <option value="0"> Selecciona un Año</option>
                                    @foreach($anos as $ano)

                                        <option 
                                        @if(isset($producto))
                                            @if($ano->id == $producto->ano->id)
                                                selected 
                                            @endif
                                        @endif

                                        value="{{ $ano->id }}"> {{ ucwords($ano->nombre) }} </option>
                                
                                     @endforeach
                                </select>
                            </div>
                            @else
                            <div>
                                <x-label for="ano" class="label-form"  :value="__('Años')" />
                                <select name="ano" id="ano">
                                    <option value="0"> Selecciona un Año</option>
            
                                </select>
                            </div>
                            @endif


                            @if(isset($producto))
                            <div>
                                <x-label for="version" class="label-form"  :value="__('Versiones del vehículo')" />
                                <select id="version" name="version">
                                    <option value="0"> Selecciona una Versión</option>
                                    @foreach($versiones as $version)

                                        <option 

                                        @if($producto->version->id == $version->id)
                                            selected
                                        @endif

                                        value="{{ $version->id }}"> {{ ucwords($version->nombre) }} </option>
                                    
                                    @endforeach
                                </select>
                            </div>
                            @else
                            <div>
                                <x-label for="version" class="label-form"  :value="__('Versiones del vehículo')" />
                                <select id="version" name="version">
                                    <option value="0"> Selecciona una Versión</option>
                                   
                                </select>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div>
                                 <x-label for="descripcion" class="label-form"  :value="__('Descripción')" />
                                <textarea name="descripcion" id="descripcion">
                                    {{ $producto->descripcion }}
                                </textarea>
                            </div>

                            @else

                            <div>
                                 <x-label for="descripcion" class="label-form"  :value="__('Descripción')" />
                                <textarea name="descripcion">
                                    
                                </textarea>
                            </div>
                            
                            @endif

                            @if(isset($producto))

                            <div>
                                <x-label for="caracteristicas" class="label-form"  :value="__('Características')" />
                                <textarea name="caracteristicas" id="caracteristicas">
                                    {{ $producto->caracteristicas }}
                                </textarea>
                            </div>

                            @else

                            <div>
                                <x-label for="caracteristicas" class="label-form"  :value="__('Características')" />
                                <textarea name="caracteristicas">
                                    
                                </textarea>
                            </div>

                            @endif

                            @if(isset($producto))
                            <div>
                                <x-label for="peso" class="label-form"  :value="__('Peso')" />

                                <x-input id="peso" class="input-form block mt-1 w-full" type="text" name="peso" :value="$producto->peso" required autofocus placeholder=""/>
                            </div>
                            @else

                            <div>
                                <x-label for="peso" class="label-form"  :value="__('Peso')" />

                                <x-input id="peso" class="input-form block mt-1 w-full" type="text" name="peso" :value="old('peso')" required autofocus placeholder=""/>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div>
                                <x-label for="dimensiones" class="label-form"  :value="__('Dimensiones')" />

                                <x-input id="dimensiones" class="input-form block mt-1 w-full" type="text" name="dimensiones" :value="$producto->dimensiones" required autofocus placeholder=""/>
                            </div>

                            @else
                            
                            <div>
                                <x-label for="dimensiones" class="label-form"  :value="__('Dimensiones')" />

                                <x-input id="dimensiones" class="input-form block mt-1 w-full" type="text" name="dimensiones" :value="old('dimensiones')" required autofocus placeholder=""/>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div>
                                <x-label for="precio" class="label-form"  :value="__('Precio')" />

                                <x-input id="precio" class="input-form block mt-1 w-full" type="number" name="precio" :value="$producto->precio" required autofocus placeholder=""/>
                            </div>

                            @else

                             <div>
                                <x-label for="precio" class="label-form"  :value="__('Precio')" />

                                <x-input id="precio" class="input-form block mt-1 w-full" type="number" name="precio" :value="old('precio')" required autofocus placeholder=""/>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div>
                                <x-label for="promocionado" class="label-form"  :value="__('¿Tiene promoción?')" />
                                <div>
                                    
                                    <input 
                                    @if($producto->promocionado == '1')
                                        selected
                                    @endif
                                    type="radio" name="promocionado" value="1" id="es-promocionado">
                                    <label for="es-promocionado">Si</label>
                                        
                                </div>
                            
                                 <div>
                                    
                                    <input 
                                    @if($producto->promocionado == '0')
                                        selected
                                    @endif
                                    type="radio" name="promocionado" value="0" id="no-es-promocionado">    
                                    <label for="no-es-promocionado">No</label>
                                    
                                </div>
                                                                
                            </div>

                            @else

                            <div>
                                <x-label for="promocionado" class="label-form"  :value="__('¿Tiene promoción?')" />
                                <div>
                                    
                                    <input type="radio" name="promocionado" value="1" id="es-promocionado">
                                    <label for="es-promocionado">Si</label>
                                        
                                </div>
                            
                                 <div>
                                    
                                    <input type="radio" name="promocionado" value="0" id="no-es-promocionado">    
                                    <label for="no-es-promocionado">No</label>
                                    
                                </div>
                                                                
                            </div>

                            @endif

                            @if(isset($producto))
                            <div>
                                 <x-label for="imagenes" class="label-form"  :value="__('Imágenes actuales')" />
                            </div>
                            <div id="slick" style="width:250px">
                                @foreach($producto->number_imgs as $img)
                                
                                    <img src="/{{$img}}" style="width:250px; height:250px;">
                                    
                                
                                @endforeach
                            </div>

                            <div>
                                 <x-label for="imagenes" class="label-form"  :value="__('Imagenes:')" />
                                 <p>
                                     Formato aceptado: .jpg
                                 </p>
                                 <p>
                                     Maximo: 6 imágenes
                                 </p>
                                 @if(isset($producto))

                                 <p style="color:red">
                                     Las imágenes anteriores serán eliminadas.
                                 </p>

                                 @endif
                                     
                                
                                 <input type="file" id="imagenes"name="imagenes[]" accept=".jpg" multiple >
                            </div>

                            @else

                            <div>
                                 <x-label for="imagenes" class="label-form"  :value="__('Imágenes nuevas:')" />
                                 <p>
                                     Formato aceptado: .jpg
                                 </p>
                                 <p>
                                     Maximo: 6 imágenes
                                 </p>
                                     
                                
                                 <input type="file" name="imagenes[]" accept=".jpg" multiple >
                            </div>

                            @endif


                            <x-button class="buttom-submit">
                                {{ __('Guardar') }}
                            </x-button>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    $(function(){


        $('#marca').on('change', function(){

            console.log($('#marca').val());
            var marca = $('#marca').val();

            $.ajax({
                url: '/marcas/'+marca+'/modelos',
                method: 'GET',
                data: {},
                success: function(response){
                    
                    console.log(response);

                    var contenido = '<option value="0"> Selecciona un Modelo</option>';

                    $.each(response['modelos'], function(key, modelo){

                        contenido += '<option value="'+modelo['id']+'">'+modelo['nombre']+'</option>';
                    
                    });

                    $('#modelo').html(contenido);

                    $('#ano').html('<option value="0"> Selecciona un Año</option>');

                     $('#version').html('<option value="0"> Selecciona una Versión</option>');
                }
            });

        });



        $('#modelo').on('change', function(){

            //console.log($('#marca').val());
            var modelo = $('#modelo').val();

            $.ajax({
                url: '/modelos/'+modelo+'/anos',
                method: 'GET',
                data: {},
                success: function(response){
                    
                //    console.log(response);

                    var contenido = '<option value="0"> Selecciona un Año</option>';

                    $.each(response['anos'], function(key, ano){

                        contenido += '<option value="'+ano['id']+'">'+ano['nombre']+'</option>';
                    
                    });

                    $('#ano').html(contenido);

                    $('#version').html('<option value="0"> Selecciona una Versión</option>');

                }
            });

        });



         $('#ano').on('change', function(){

            //console.log($('#marca').val());
            var ano = $('#ano').val();

            $.ajax({
                url: '/anos/'+ano+'/versiones',
                method: 'GET',
                data: {},
                success: function(response){
                    
                //    console.log(response);

                    var contenido = '<option value="0"> Selecciona una Versión</option>';

                    $.each(response['versiones'], function(key, version){

                        contenido += '<option value="'+version['id']+'">'+version['nombre']+'</option>';
                    
                    });

                    $('#version').html(contenido);

                }
            });

        });
        
        
        
    });
</script>

@if(isset($producto))

<script type="text/javascript">
    $(function(){

        if ({{$producto->promocionado}} == '1') {
            $('#es-promocionado').attr('checked', 'checked');
        }else{
            $('#no-es-promocionado').attr('checked', 'checked')
        }

        $('#slick').slick({
            dots: true,
            arrows: true
        });

    });
</script>
<!--

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

-->
<script type="text/javascript" src="/vendor/slick-1.8.1/slick/slick.min.js"></script>


<style type="text/css">
    .slick-arrow{

    }

    /* Slider */
.slick-slider
{
    position: relative;

    display: block;
    box-sizing: border-box;

    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;

    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;

    display: block;
    overflow: hidden;

    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;

    display: block;
    margin-left: auto;
    margin-right: auto;
}
.slick-track:before,
.slick-track:after
{
    display: table;

    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;

    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;

    height: auto;

    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}

@charset 'UTF-8';
/* Slider */
.slick-loading .slick-list
{
    background: #fff url('./ajax-loader.gif') center center no-repeat;
}

/* Icons */
@font-face
{
    font-family: 'slick';
    font-weight: normal;
    font-style: normal;

    src: url('./fonts/slick.eot');
    src: url('./fonts/slick.eot?#iefix') format('embedded-opentype'), url('./fonts/slick.woff') format('woff'), url('./fonts/slick.ttf') format('truetype'), url('./fonts/slick.svg#slick') format('svg');
}
/* Arrows */
.slick-prev,
.slick-next
{
    font-size: 0;
    line-height: 0;

    position: absolute;
    top: 50%;

    display: block;

    width: 20px;
    height: 20px;
    padding: 0;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);

    cursor: pointer;

    color: transparent;
    border: none;
    outline: none;
    background: transparent;

    z-index: 2;
}
.slick-prev:hover,
.slick-prev:focus,
.slick-next:hover,
.slick-next:focus
{
    color: transparent;
    outline: none;
    background: transparent;
}
.slick-prev:hover:before,
.slick-prev:focus:before,
.slick-next:hover:before,
.slick-next:focus:before
{
    opacity: 1;
}
.slick-prev.slick-disabled:before,
.slick-next.slick-disabled:before
{
    opacity: .25;
}

.slick-prev:before,
.slick-next:before
{
    font-family: 'slick';
    font-size: 40px;
    line-height: 1;

    opacity: .75;
    color: green;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.slick-prev
{
    left: -25px;
}
[dir='rtl'] .slick-prev
{
    right: -25px;
    left: auto;
}
.slick-prev:before
{
    content: '←';
}
[dir='rtl'] .slick-prev:before
{
    content: '→';
}

.slick-next
{
    right: -25px;
}
[dir='rtl'] .slick-next
{
    right: auto;
    left: -25px;
}
.slick-next:before
{
    content: '→';
}
[dir='rtl'] .slick-next:before
{
    content: '←';
}

/* Dots */
.slick-dotted.slick-slider
{
    margin-bottom: 30px;
}

.slick-dots
{
    position: absolute;
    bottom: -25px;

    display: block;

    width: 100%;
    padding: 0;
    margin: 0;

    list-style: none;

    text-align: center;
}
.slick-dots li
{
    position: relative;

    display: inline-block;

    width: 20px;
    height: 20px;
    margin: 0 5px;
    padding: 0;

    cursor: pointer;
}
.slick-dots li button
{
    font-size: 0;
    line-height: 0;

    display: block;

    width: 20px;
    height: 20px;
    padding: 5px;

    cursor: pointer;

    color: transparent;
    border: 0;
    outline: none;
    background: transparent;
}
.slick-dots li button:hover,
.slick-dots li button:focus
{
    outline: none;
}
.slick-dots li button:hover:before,
.slick-dots li button:focus:before
{
    opacity: 1;
}
.slick-dots li button:before
{
    font-family: 'slick';
    font-size: 6px;
    line-height: 20px;

    position: absolute;
    top: 0;
    left: 0;

    width: 20px;
    height: 20px;

    content: '•';
    text-align: center;

    opacity: .25;
    color: black;

    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.slick-dots li.slick-active button:before
{
    opacity: .75;
    color: black;
}
</style>

@endif