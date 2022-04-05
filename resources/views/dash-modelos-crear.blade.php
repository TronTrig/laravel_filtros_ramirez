<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Modelos De Vehículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="display:flex; justify-content: center;">
                        
                        <form method="POST" action="/modelos" name="crear" id="crear">
                           @csrf

                           @if(isset($modelo))

                           <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre del modelo')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="$modelo->nombre" required autofocus placeholder=""/>
                            </div>

                           @else
                            <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre del modelo')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus placeholder=""/>
                            </div>
                            @endif


                            <div>
                                <x-label for="marca" class="label-form"  :value="__('Categorias')" />
                                <select id="marca" name="marca">

                                    @foreach($marcas as $marca)

                                        <option
                                        @if(isset($modelo))

                                            @if($modelo->marca->id == $marca->id))
                                                selected
                                            @endif
                                        @endif
                                         value="{{ $marca->id }}"> {{ ucwords($marca->nombre) }} </option>
                                    
                                    @endforeach
                                </select>
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
@if(isset($modelo))

    <script type="text/javascript">
        $(function(){

            function update(id)
            {

                var nombre = $('#nombre').val();
                var marca = $('#marca option:selected').val();

                $.ajax({
                    url: '/modelos/'+id,
                    method: 'PUT',
                    data:{
                        'nombre': nombre,
                        'marca': marca
                    },
                    success: function(response){
                      //  console.log(response)
                       window.location.replace('/dash-modelos');
                    }
                });
            }

            $('#crear').on('submit', function(e){
                e.preventDefault();
                update({{ $modelo->id }});

            });
        });
    </script>

@endif