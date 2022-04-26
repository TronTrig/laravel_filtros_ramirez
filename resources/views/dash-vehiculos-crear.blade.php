@extends('layouts.container')

@section('title', 'Crear Vehículo')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading --> 
        <h1 class="h3 mb-2 text-gray-800">Crear Vehículo</h1>
        <p class="mb-4">Formulario para la creación de nuevos vehículos.</p>

        <!-- contenido -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="width: 60%; margin: auto;">
                        
                      
                        @if(isset($vehiculo))
                        
                        <form method="POST" action="{{ route('vehiculos.update', ['vehiculo' => $vehiculo->id]) }}" name="crear" id="crear">

                        @method('PUT')

                        @else
                        <form method="POST" action="{{ route('vehiculos.store') }}" name="crear" id="crear">
                        
                        @endif
                           @csrf

                          
                            

                            <div>
                                <x-label for="marca_id" class="label-form"  :value="__('Marca')" />
                                <select name="marca_id" id="marca_id" class="shadow-sm border-gray-300 rounded-md w-full">
                                    <option value="0"> Seleccione una Marca</option>

                                    @foreach($marcas as $marca)
                                       

                                    <option 
                                        @if(isset($vehiculo))

                                            @if($marca->id == $vehiculo->marca->id)
                                             selected
                                            @endif

                                        @endif
                                        value="{{ $marca->id }}"> {{ ucwords($marca->nombre) }} 
                                    </option>

                                       
                                    @endforeach
                                </select>
                            </div>



                            <div>
                                <x-label for="modelo_id" class="label-form"  :value="__('Modelo')" />
                                <select name="modelo_id" id="modelo_id" style="text-transform: capitalize;" class="shadow-sm border-gray-300 rounded-md w-full">
                                    <option value="0"> Seleccione un Modelo</option>

                                    @if(isset($vehiculo))
                                        @foreach($modelos as $modelo)
                                            <option  
                                    
                                                    @if($modelo->id == $vehiculo->modelo->id)
                                                     selected
                                                    @endif
                                                
                                                value="{{ $modelo->id }}"> {{ ucwords($modelo->nombre) }} 
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>



                            <div>
                                <x-label for="tipo" class="label-form"  :value="__('Tipo')" />
                                 <select name="tipo" id="tipo" class="shadow-sm border-gray-300 rounded-md w-full">
                                    <option value="0"> Seleccione un Modelo</option>
                                    @php
                                        $tipos = [
                                            'automóviles ligeros',
                                            'camiones y autobuses',
                                            'vehículos pesados y máquinas',
                                            'agrícolas',
                                            'marinos',
                                            'otros vehículos y máquinas',
                                            'motocicletas',
                                            'quads'
                                        ];
                                    @endphp

                                    
                                        @foreach($tipos as $tipo)
                                            <option  
                                            @if(isset($vehiculo))
                                                    @if($tipo == $vehiculo->tipo)
                                                     selected
                                                    @endif
                                            @endif
                                                value="{{ $tipo }}"> {{ ucwords( $tipo ) }} 
                                            </option>
                                        @endforeach
                                    
                                </select>


                            </div>

                            <div>
                                <x-label for="tipo_modelo" class="label-form"  :value="__('Tipo de Modelo')" />
                                <x-input id="tipo_modelo" class="input-form block mt-1 w-full" type="text" name="tipo_modelo" 

                                    :value="(isset($vehiculo)) ? $vehiculo->tipo_modelo : ''" 

                                    required autofocus placeholder=""/>
                            </div>



                            <div>
                                <x-label for="cc" class="label-form"  :value="__('CC')" />
                                <x-input id="cc" class="input-form block mt-1 w-full" type="text" name="cc" 

                                    :value="(isset($vehiculo)) ? $vehiculo->cc : ''" 

                                    required autofocus placeholder=""/>
                            </div>

                            <div>
                                <x-label for="modelo_motor" class="label-form"  :value="__('Modelo del Motor')" />
                                <x-input id="modelo_motor" class="input-form block mt-1 w-full" type="text" name="modelo_motor" 

                                    :value="(isset($vehiculo)) ? $vehiculo->modelo_motor : ''" 

                                    required autofocus placeholder=""/>
                            </div>

                            <div>
                                <x-label for="kw" class="label-form"  :value="__('KW')" />
                                <x-input id="kw" class="input-form block mt-1 w-full" type="text" name="kw" 

                                    :value="(isset($vehiculo)) ? $vehiculo->kw : ''" 

                                    required autofocus placeholder=""/>
                            </div>

                            <div>
                                <x-label for="cv" class="label-form"  :value="__('CV')" />
                                <x-input id="cv" class="input-form block mt-1 w-full" type="text" name="cv" 

                                    :value="(isset($vehiculo)) ? $vehiculo->cv : ''" 

                                    required autofocus placeholder=""/>
                            </div>

                            <div>
                                <x-label for="ano_fabricacion" class="label-form"  :value="__('Año de Fabricación')" />
                                <x-input id="ano_fabricacion" class="input-form block mt-1 w-full" type="text" name="ano_fabricacion" 

                                    :value="(isset($vehiculo)) ? $vehiculo->ano_fabricacion : ''" 

                                    required autofocus placeholder=""/>
                            </div>




                            <x-button class="buttom-submit">
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
     <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style type="text/css">
                   form label {
                    font-weight: 900 !important;
                   }
               </style>
<script type="text/javascript">
    $(function(){



        $('#marca_id').on('change', function(){

          //  console.log($('#marca').val());
            var marca = $('#marca_id').val();

            $.ajax({
                url: '/marcas/'+marca+'/modelos',
                method: 'GET',
                data: {},
                success: function(response){
                    
            //        console.log(response);

                    var contenido = '<option value="0"> Selecciona un Modelo</option>';

                    $.each(response['modelos'], function(key, modelo){

                        contenido += '<option value="'+modelo['id']+'">'+modelo['nombre']+'</option>';
                    
                    });

                    $('#modelo_id').html(contenido);

                }
            });

        });
        
        
    });
</script>

@endsection