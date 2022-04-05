<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="display:flex; justify-content: center;">
                        
                        <form method="POST" action="/categorias" name="crear" id="crear">
                           @csrf

                           @if(isset($categoria))
                           
                             <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre de la categoria')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="$categoria->nombre" required autofocus placeholder=""/>
                            </div>

                            @else

                            <div>
                                <x-label for="nombre" class="label-form"  :value="__('Nombre de la categoria')" />

                                <x-input id="nombre" class="input-form block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus placeholder=""/>
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

@if(isset($categoria))

    <script type="text/javascript">
        $(function(){

            function update(id)
            {

                var nombre = $('#nombre').val();

                $.ajax({
                    url: '/categorias/'+id,
                    method: 'PUT',
                    data:{
                        'nombre': nombre
                    },
                    success: function(response){
                      //  console.log(response)

                        window.location.replace('/dash-categorias');
                    }
                });
            }

            $('#crear').on('submit', function(e){
                e.preventDefault();
                update({{ $categoria->id }});

            });
        });
    </script>

@endif