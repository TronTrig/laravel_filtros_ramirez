<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="display:flex; justify-content: center;">

                        @if(isset($vehiculo))
                        
                        <form method="POST" action="{{ route('vehiculos.update', ['vehiculo' => $vehiculo->id]) }}" name="crear" id="crear">

                        @method('PUT')

                        @else
                        <form method="POST" action="{{ route('vehiculos.store') }}" name="crear" id="crear">
                        
                        @endif
                           @csrf

                          
                            

                            <div>
                                <x-label for="marca_id" class="label-form"  :value="__('Marca')" />
                                <select name="marca_id" id="marca_id">
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
                                <select name="modelo_id" id="modelo_id">
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
                                <x-input id="tipo" class="input-form block mt-1 w-full" type="text" name="tipo" 

                                    :value="(isset($vehiculo)) ? $vehiculo->tipo : ''" 

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
</x-app-layout>

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