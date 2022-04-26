               @extends('layouts.container')

               @section('title', 'Crear Producto')

               @section('content')

      <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Crear Producto</h1>
                    <p class="mb-4">Formulario para la creación de nuevos productos.</p>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="width: 60%;margin: auto;">

                        @if(isset($producto))

                        <form method="POST" action="/dproductos/guardar/{{$producto->id}}" name="crear" enctype="multipart/form-data" id="crear">
                        @else
                        
                        <form method="POST" action="/dproductos" name="crear" enctype="multipart/form-data" id="crear">

                        @endif
                           @csrf

                            @if(isset($producto))

                            <div class="mt-3">
                                <x-label for="sku" class="label-form "  :value="__('SKU')" />

                                <x-input id="sku" class="input-form block mt-1 w-full" type="text" name="sku" :value="$producto->sku" required autofocus placeholder=""/>
                            </div>

                            @else
                            <div class="mt-3">
                                <x-label for="sku" class="label-form"  :value="__('SKU')" />

                                <x-input id="sku" class="input-form block mt-1 w-full" type="text" name="sku" :value="old('sku')" required autofocus placeholder=""/>
                            </div>
                            @endif

                             
                            @if(isset($producto))

                            <div class="mt-3">
                                <x-label for="id-sistema-administrativo" class="label-form"  :value="__('ID Sistema Administrativo')" />

                                <x-input id="id-sistema-administrativo" class="input-form block mt-1 w-full" type="text" name="id-sistema-administrativo" :value="$producto->id_sistema_administrativo" required autofocus placeholder=""/>
                            </div>

                            @else

                            <div class="mt-3">
                                <x-label for="id-sistema-administrativo" class="label-form"  :value="__('ID Sistema Administrativo')" />

                                <x-input id="id-sistema-administrativo" class="input-form block mt-1 w-full" type="text" name="id-sistema-administrativo" :value="old('id-sistema-administrativo')" required autofocus placeholder=""/>
                            </div>

                            @endif
                            

                            @if(isset($producto))

                            <div class="mt-3">
                                <x-label for="nombre" class="label-form"  :value="__('Nombre del producto')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="$producto->nombre" required autofocus placeholder=""/>
                            </div>

                            @else

                              <div class="mt-3">
                                <x-label for="nombre" class="label-form"  :value="__('Nombre del producto')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus placeholder=""/>
                            </div>

                            @endif


                            <div class="mt-3">
                                <x-label for="subcategoria" class="label-form"  :value="__('Subcategorias')" />
                                <select name="subcategoria" id="subcategoria" class="shadow-sm border-gray-300 rounded-md w-full">
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
                             <div class="mt-3">
                                <x-label for="marca" class="label-form"  :value="__('Marcas')" />
                                <select name="marca" id="marca" class="shadow-sm border-gray-300 rounded-md w-full">
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
                                <div class="mt-3">
                                <x-label for="modelo" class="label-form"  :value="__('Modelos')" />
                                    <select name="modelo" id="modelo" class="shadow-sm border-gray-300 rounded-md w-full">
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
                            <div class="mt-3">
                                <x-label for="modelo" class="label-form"  :value="__('Modelos')" />
                                <select name="modelo" id="modelo" class="shadow-sm border-gray-300 rounded-md w-full">
                                    <option value="0"> Selecciona un Modelo</option>

                                </select>
                            </div>
                            @endif

                            @if(isset($producto))

                            <div class="mt-3">
                                 <x-label for="descripcion" class="label-form"  :value="__('Descripción')" />
                                <textarea name="descripcion" id="descripcion" class="shadow-sm border-gray-300 rounded-md w-full">
                                    {{ $producto->descripcion }}
                                </textarea>
                            </div>

                            @else

                            <div class="mt-3">
                                 <x-label for="descripcion" class="label-form"  :value="__('Descripción')" />
                                <textarea name="descripcion" class="shadow-sm border-gray-300 rounded-md w-full">
                                    
                                </textarea>
                            </div>
                            
                            @endif

                            @if(isset($producto))

                            <div class="mt-3">
                                <x-label for="caracteristicas" class="label-form"  :value="__('Características')" />
                                <textarea name="caracteristicas" id="caracteristicas" class="shadow-sm border-gray-300 rounded-md w-full">
                                    {{ $producto->caracteristicas }}
                                </textarea>
                            </div>

                            @else

                            <div class="mt-3">
                                <x-label for="caracteristicas" class="label-form"  :value="__('Características')" />
                                <textarea name="caracteristicas" class="shadow-sm border-gray-300 rounded-md w-full">
                                    
                                </textarea>
                            </div>

                            @endif

                            @if(isset($producto))
                            <div class="mt-3">
                                <x-label for="peso" class="label-form"  :value="__('Peso')" />

                                <x-input id="peso" class="input-form block mt-1 w-full" type="text" name="peso" :value="$producto->peso" required autofocus placeholder=""/>
                            </div>
                            @else

                            <div class="mt-3">
                                <x-label for="peso" class="label-form"  :value="__('Peso')" />

                                <x-input id="peso" class="input-form block mt-1 w-full" type="text" name="peso" :value="old('peso')" required autofocus placeholder=""/>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div class="mt-3">
                                <x-label for="dimensiones" class="label-form"  :value="__('Dimensiones')" />

                                <x-input id="dimensiones" class="input-form block mt-1 w-full" type="text" name="dimensiones" :value="$producto->dimensiones" required autofocus placeholder=""/>
                            </div>

                            @else
                            
                            <div class="mt-3">
                                <x-label for="dimensiones" class="label-form"  :value="__('Dimensiones')" />

                                <x-input id="dimensiones" class="input-form block mt-1 w-full" type="text" name="dimensiones" :value="old('dimensiones')" required autofocus placeholder=""/>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div class="mt-3">
                                <x-label for="precio" class="label-form"  :value="__('Precio')" />

                                <x-input id="precio" class="input-form block mt-1 w-full" type="number" name="precio" :value="$producto->precio" required autofocus placeholder=""/>
                            </div>

                            @else

                             <div class="mt-3">
                                <x-label for="precio" class="label-form"  :value="__('Precio')" />

                                <x-input id="precio" class="input-form block mt-1 w-full" type="number" name="precio" :value="old('precio')" required autofocus placeholder=""/>
                            </div>

                            @endif

                            @if(isset($producto))

                            <div class="mt-3">
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

                            <div class="mt-3">
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
                            <div class="mt-3">
                                 <x-label for="imagenes" class="label-form"  :value="__('Imágenes actuales')" />
                            </div>
                            <div id="slick" style="width:100%">
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
                                     Las imágenes anteriores serán elimiandas.
                                 </p>

                                 @endif
                                     
                                
                                 <input type="file" id="imagenes"name="imagenes[]" accept=".jpg" multiple >
                            </div>

                            @else

                            <div class="mt-3">
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


                            <x-button class="buttom-submit mt-3">
                                {{ __('Guardar') }}
                            </x-button>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('scripts')


    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>



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

<link href="/vendor/slick-1.8.1/slick/slick2.css" rel="stylesheet" type="text/css">


@endif

 <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style type="text/css">
                   form label {
                    font-weight: 900 !important;
                   }
               </style>

@endsection