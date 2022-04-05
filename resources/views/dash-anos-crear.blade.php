<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Años De Los Vehículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="display:flex; justify-content: center;">
                        
                        <form method="POST" action="/anos" name="crear" id="crear">
                           @csrf

                           @if(isset($ano))

                           <div>
                                <x-label for="nombre" class="label-form"  :value="__('Año')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="number" name="nombre" :value="$ano->nombre" required autofocus placeholder=""/>
                            </div>
                           @else
                            <div>
                                <x-label for="nombre" class="label-form"  :value="__('Año')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="number" name="nombre" :value="old('nombre')" required autofocus placeholder=""/>
                            </div>

                            @endif
                             <div>
                                <x-label for="marca" class="label-form"  :value="__('Marcas')" />
                                <select  name="marca" id="marca">
                                    <option value="0"> Selecciona una Marca</option>
                                    @foreach($marcas as $marca)

                                        <option 
                                        @if(isset($ano))
                                            @if($ano->modelo->marca->id == $marca->id)
                                                selected
                                            @endif
                                        @endif
                                        value="{{ $marca->id }}"> {{ ucwords($marca->nombre) }} </option>
                                    
                                    @endforeach
                                </select>
                            </div>
                            @if(isset($ano))
                                
                            <div>
                                <x-label for="modelo" class="label-form"  :value="__('Modelos')" />
                                <select name="modelo" id="modelo">
                                    <option value="0"> Selecciona un Modelo</option>
                                    @foreach($modelos as $modelo)

                                        <option 

                                        @if($ano->modelo->id == $modelo->id)
                                            selected
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

          //  console.log($('#marca').val());
            var marca = $('#marca').val();

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

                    $('#modelo').html(contenido);

                }
            });

        });
        
        
    });
</script>

@if(isset($ano))

    <script type="text/javascript">
        $(function(){

            function update(id)
            {

                var nombre = $('#nombre').val();
                var modelo = $('#modelo option:selected').val();
               

                $.ajax({
                    url: '/anos/'+id,
                    method: 'PUT',
                    data:{
                        'nombre': nombre,
                        'modelo': modelo
                    },
                    success: function(response){
                      //  console.log(response)
                       window.location.replace('/dash-anos');
                    }
                });
            }

            $('#crear').on('submit', function(e){
                e.preventDefault();
                update({{ $ano->id }});

            });
        });
    </script>

@endif