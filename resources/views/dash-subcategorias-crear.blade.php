@extends('layouts.container')

@section('title', 'Crear Subcategoría')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading --> 
        <h1 class="h3 mb-2 text-gray-800">Crear Subcategoría</h1>
        <p class="mb-4">Formulario para la creación de nuevas Subcategorías.</p>

        <!-- contenido -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="width: 60%; margin: auto;">
                        
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
                                <select name="categoria" id="categoria" class="shadow-sm border-gray-300 rounded-md w-full">

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
                                <select name="categoria" class="shadow-sm border-gray-300 rounded-md w-full">

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
@endsection