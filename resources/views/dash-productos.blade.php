               @extends('layouts.container')

               @section('title', 'Inicio')

               @section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Productos</h1>
                    <p class="mb-4">Lista de todos los Productos registrados en la tienda en línea.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                             <div>
                                <a href="/dproductos/create" class="add-new-button">Nuevo</a>
                            </div>
                   
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>SKU</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Subcategoría</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>SKU</th>
                                            <th>Nombre</th>
                                            <th>Categoría</th>
                                            <th>Subcategoría</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($productos as $producto)
                                            <tr>
                                                <td>{{ $producto->id }}</td>
                                                <td>{{ $producto->sku }}</td>
                                                <td>{{ ucwords($producto->nombre) }}</td>
                                                <td>{{ ucwords($producto->categoria->nombre) }}</td>
                                                <td>{{ ucwords($producto->subcategoria->nombre) }}</td>
                                                <td>
                                                    <div class="data-table-actions-layout">
                                                    
                                                        <div>
                                                            <a class="btn btn-secondary btn-icon-split" href="/dproductos/{{ $producto->id }}/edit">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-arrow-right"></i>
                                                                </span> <span class="text">Modificar</span>
                                                            </a>
                                                        </div>
                                                   
                                                        <div>
                                                            <a class="btn btn-danger btn-icon-split w-100" onclick="eliminar({{ $producto->id }})">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-trash"></i>
                                                                </span>
                                                                <span class="text">Eliminar</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

        @endsection

    @section('scripts')


        <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    


    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>


    <script type="text/javascript">

        function eliminar(id)
        {
            $.ajax({
                url: '/dproductos/'+id,
                method: 'DELETE',
                data:{

                },
                success: function(response){
                    console.log(response)

                    window.location.replace('/dash-productos');
                }
            });
        }

    </script>   


    @endsection