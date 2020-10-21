@extends ('layouts.admin')
@section('contenido')
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.js">
    </script>
     <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>Salarios y prestaciones
                        <div class="page-title-subheading">Sistema de Administración
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                <a href="salario_empleado/create"> <button type="button" data-toggle="tooltip" title="Registrar" data-placement="bottom"
                        class="btn-shadow mr-3 btn btn-primary">
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
                <table class="table table-hover table-sm table-bordered" id="tblcargos">
                    <thead>
                            <th nowrap>Nombre Empleado</th>
                            <th nowrap>Cargo</th>
                            <th nowrap>Salario</th>
                            <th nowrap>Impuestos</th>
                            <th nowrap>Salud</th>
                            <th nowrap>Pension</th>
                            <th nowrap>Valor primas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salario_empleado as $sal_emp)
                        <tr>
                            <td nowrap>{{ $sal_emp->nombre_empleado }}</td>
                            <td nowrap>{{ $sal_emp->descripcion_cargo }}</td>
                            <td nowrap>{{ $sal_emp->salario }}</td>
                            <td nowrap>{{ $sal_emp->impuestos }}</td>
                            <td nowrap>{{ $sal_emp->salud }}</td>
                            <td nowrap>{{ $sal_emp->pension }}</td>
                            <td nowrap>{{ $sal_emp->valor_primas }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <script>
                        $(document).ready(function () {
                            $('#tblcargos').DataTable({
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
