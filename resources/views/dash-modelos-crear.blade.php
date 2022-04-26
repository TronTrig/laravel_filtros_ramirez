@extends('layouts.container')

@section('title', 'Crear Modelo')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading --> 
        <h1 class="h3 mb-2 text-gray-800">Crear Modelo</h1>
        <p class="mb-4">Formulario para la creación de nuevos modelos.</p>

        <!-- contenido -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div style="width: 60%; margin: auto;">
                        
  
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
                                <select id="marca" name="marca" class="shadow-sm border-gray-300 rounded-md w-full">

                                    <option> Selecciona una Marca</option>

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

@endsection