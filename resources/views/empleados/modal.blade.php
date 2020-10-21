<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-estado-{{$emp->id_empleado}}" data-backdrop="false">
    <form class="needs-validation" novalidate method="POST" action="{{route('empleados.update', $emp->id_empleado)}}">
        {!! method_field('PUT')!!}
        @csrf
        <br>
        <br>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Estado</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="numero_documento" class="form-control" value="{{$emp->numero_documento}}" required>
                    <input type="hidden" name="nombre_empleado" class="form-control" value="{{$emp->nombre_empleado}}" required>
                    <input type="hidden" name="apellido_empleado" class="form-control" value="{{$emp->apellido_empleado}}" required>
                    <input type="hidden" name="telefono" class="form-control" value="{{$emp->telefono}}" required>
                    <input type="hidden" name="direccion" class="form-control" value="{{$emp->direccion}}" required>
                    <input type="hidden" name="id_cargo" class="form-control" value="{{$emp->id_cargo}}" required>
                    @if($emp->estado=="Activo")
                    <p>Seguro que desea cambiar el estado a "Inactivo"</p>
                    <input type="hidden" name="estado" value="Inactivo">
                    @else
                    <p>Seguro que desea cambiar el estado a "Activo"</p>
                    <input type="hidden" name="estado" value="Activo">
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-primary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="mb-2 mr-2 border-0 btn-transition btn btn-outline-success">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>


