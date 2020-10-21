@extends('layouts.admin')
@section('contenido')
<!DOCTYPE html>
<html>

<head>
    <title></title>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

    </script>
    <style>
        .btnatras {
            color: red;
        }

    </style>
    <div class="app-main__inner col">
        <div class="app-page-title">
            <div class="page-title-wrapper ">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-portfolio icon-gradient bg-arielle-smile"> </i>
                    </div>
                    <div>Salario Empleados
                        <div class="page-title-subheading">Sistema de Administración
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Rena Ware</h5>
                <div>
                    <!-- Obtengo la sesión actual del usuario -->
                    {{ $message=Session::get('message') }}

                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                </div>
                <form class="needs-validation" novalidate method="POST" action="{{route('salario_empleado.store')}}">
                    @csrf
                    <div class="box">
                        <div class="box-body">
                            <div class="row">

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Empleado</label>
                                        <select class="form-control" name="id_empleado" required>
                                            <option value="">Seleccione Empleado</option>
                                            @foreach($empleados as $emp)
                                            <option value="{{$emp->id_empleado}}">
                                                {{$emp->nombre_empleado}} {{$emp->apellido_empleado}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Cargo</label>
                                        <select class="form-control" name="id_cargo" id="cargo" required
                                            onchange="colocar_salario()">
                                            <option value="">Seleccione Cargo</option>
                                            @foreach($cargos as $car)
                                            <option value="{{$car->id_cargo}}"
                                                salario="{{$car->salario}}">
                                                {{$car->descripcion_cargo}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">Salario</label>
                                        <input type="number" name="salario" min="1" id="salario"
                                            class="form-control" value="0" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">impuestos</label>
                                        <input type="text" name="impuestos" class="form-control" value="0" id="impuestos"
                                            placeholder="Valor impuestos" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">salud</label>
                                        <input type="text" name="salud" class="form-control" value="0"
                                            id="salud" placeholder="Valor salud" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">pensión</label>
                                        <input type="number" name="pension" class="form-control" value="0"
                                            id="pension" placeholder="Valor pensión" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="validationTooltip04">valor primas</label>
                                        <input type="number" name="valor_primas" class="form-control" value="0"
                                            id="valor_primas" placeholder="Valor primas" required readonly>
                                        <div class="invalid-feedback">
                                            Campo Obligatorio
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group" align="right">
                            <div class="form-group">
                                <button type="submit" class="mb-2 mr-2 btn btn-success">Guardar</button>
                                <a href="{{route('salario_empleado.index')}}">Volver a la lista</a>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</body>
</html>
@stop

@section('script')

<script>
// funcion para calcular las prestaciones del empleado
    function colocar_salario() {
        let salario = $("#cargo option:selected").attr("salario");
        $("#salario").val(salario);
        
        let primas = salario * 2;
        let input_primas = document.getElementById('valor_primas');
        input_primas.value = primas;

        let impuestos = primas * 0.12;
        let input_impuestos = document.getElementById('impuestos');
        input_impuestos.value = impuestos;

        let salud = primas * 0.08;
        let input_salud = document.getElementById('salud');
        input_salud.value = salud;

        let pension = salario * 0.2;
        let input_pension = document.getElementById('pension');
        input_pension.value = pension;

    };
</script>
@endsection
