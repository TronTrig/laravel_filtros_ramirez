<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Subcategorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="display:flex; justify-content: center;">

                        @if(isset($subcategoria))
                        
                        <form method="PUT" action="/subcategorias" name="crear" id="crear">
                        @else
                        <form method="POST" action="/subcategorias" name="crear" id="crear">
                        
                        @endif
                           @csrf

                            <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre de la subcategoria')" />
                            
                                
                            @if(isset($subcategoria))
                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="$subcategoria->nombre" required autofocus placeholder=""/>
                            </div>
                            @else
                            <div>
                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus placeholder=""/>
                            </div>
                            @endif
                            
                            @if(isset($subcategoria))
                            <div>
                                <x-label for="categoria" class="label-form"  :value="__('Categorias')" />
                                <select name="categoria" id="categoria">

                                    @foreach($categorias as $categoria)
                                       

                                        <option 

                                        @if($categoria->id == $subcategoria->categoria->id)
                                            selected
                                        @endif
                                        value="{{ $categoria->id }}"> {{ ucwords($categoria->nombre) }} </option>

                                       
                                    @endforeach
                                </select>
                            </div>
                            @else
                            <div>
                                <x-label for="categoria" class="label-form"  :value="__('Categorias')" />
                                <select name="categoria" >

                                    @foreach($categorias as $categoria)

                                        <option value="{{ $categoria->id }}"> {{ ucwords($categoria->nombre) }} </option>
                                    
                                    @endforeach
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

@if(isset($subcategoria))

    <script type="text/javascript">
        $(function(){

            function update(id)
            {
              
                var categoria = $('#categoria option:selected').val();
                var nombre = $('#nombre').val();

                $.ajax({
                    url: '/subcategorias/'+id,
                    method: 'PUT',
                    data:{
                        'nombre': nombre,
                        'categoria': categoria
                    },
                    success: function(response){
                      //  console.log(response)

                        window.location.replace('/dash-subcategorias');
                    }
                });
            }

            $('#crear').on('submit', function(e){
                e.preventDefault();
                update({{ $subcategoria->id }});

            });
        });
    </script>

@endif