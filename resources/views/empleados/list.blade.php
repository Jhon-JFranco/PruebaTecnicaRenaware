@extends ('layouts.admin')
@section('contenido')
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.js">
    </script>
    <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-users icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>EMPLEADOS
                        <div class="page-title-subheading">Sistema de Administración
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="empleados/create"> <button type="button" data-toggle="tooltip" title="Registrar" data-placement="bottom" class="btn-shadow mr-3 btn btn-primary">
                            NUEVO <i class="fa fa-plus-circle"></i>
                        </button></a>
                </div>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-sm table-bordered " id="tblempleados">
                        <thead>
                            <tr>
                                <th nowrap>Documento</th>
                                <th nowrap>Nombre</th>
                                <th nowrap>Apellido</th>
                                <th nowrap>Teléfono</th>
                                <th nowrap>Dirección</th>
                                <th nowrap>Estado</th>

                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $emp)
                            <tr>
                                <td nowrap>{{ $emp->numero_documento }}</td>
                                <td nowrap>{{ $emp->nombre_empleado }}</td>
                                <td nowrap>{{ $emp->apellido_empleado }}</td>
                                <td nowrap>{{ $emp->telefono }}</td>
                                <td nowrap>{{ $emp->direccion }}</td>
                                <td nowrap>
                                    @if($emp->estado=="Activo")
                                    <button type="button" class="col-md-12 btn btn-success btn-sm" data-toggle="modal" data-target="#modal-estado-{{$emp->id_empleado}}">Activo</button>
                                    @else
                                    <button type="button" class="col-md-12 btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-estado-{{$emp->id_empleado}}">Inactivo</button>
                                    @endif
                                </td>

                                <td><a href="{{URL::action('EmpleadosController@edit',$emp->id_empleado)}}">
                                        <button class="btn btn-primary btn-sm" data-toggle="tooltip" title="Editar"><i class="fas fa-edit  fa-lg"></i>
                                        </button>
                                </td>
                            </tr>
                            @include('empleados.modal')
                            @endforeach
                        </tbody>
                        <script>
                            $(document).ready(function() {
                                $('#tblempleados').DataTable({
                                    "language": {
                                        "lengthMenu": "_MENU_ Registros por pagina",
                                        "zeroRecords": "Sin Resultados",
                                        "search": "Buscar:",
                                        "info": "Listado _PAGE_ de _PAGES_ Paginas",
                                        "infoEmpty": "Sin Resultados",
                                        "infoFiltered": "(Busqueda de un total _MAX_ registros)",
                                        "paginate": {
                                            "first": "Primero",
                                            "last": "Ultimo",
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }
                                    }
                                });
                            });
                        </script>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
@stop