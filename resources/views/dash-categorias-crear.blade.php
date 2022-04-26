@extends('layouts.container')

@section('title', 'Crear Categoría')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading --> 
        <h1 class="h3 mb-2 text-gray-800">Crear Categoría</h1>
        <p class="mb-4">Formulario para la creación de nuevas categorías.</p>

        <!-- contenido -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="width: 60%; margin: auto;">
                        
                        <form method="POST" action="/categorias" name="crear" id="crear">
                           @csrf

                           @if(isset($categoria))
                           
                             <div>
                                <x-label for="nombre" class="block font-medium text-sm text-gray-700 label-form"  :value="__('Nombre de la categoria')" />

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

@endsection