
<div id="modal_edit_difunto" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Informacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/difuntos/edit') }} " method="POST" role="form text-left">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_difunto" id="id_difunto">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="difunto_nombre" class="form-control-label">{{ __('Nombre') }}</label>
                            <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Nombre" id="difunto_nombre" name="nombre">
                                    @error('nombre')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="difunto_apellido" class="form-control-label">{{ __('Apellido') }}</label>
                            <div class="@error('apellido')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Apellido" id="difunto_apellido" name="apellido">
                                    @error('apellido')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="difunto_difunto_ci" class="form-control-label">{{ __('Cedula de Identidad') }}</label>
                            <div class="@error('difunto_ci')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Cedula Identidad" id="difunto_ci" name="difunto_ci">
                                    @error('difunto_ci')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="causa_muerte" class="form-control-label">{{ __('Causa de Muerte') }}</label>
                            <div class="@error('causa_muerte')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="causa_muerte" placeholder="fecha muerte" id="causa_muerte" name="causa_muerte">
                                    @error('causa_muerte')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_nacimiento" class="form-control-label">{{ __('Fecha de nacimiento') }}</label>
                            <div class="@error('user.fecha_nacimiento')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="tel" placeholder="40770888444" id="fecha_nacimiento" name="fecha_nacimiento">
                                    @error('fecha_nacimiento')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fecha_muerte" class="form-control-label">{{ __('fecha_muerte') }}</label>
                            <div class="@error('user.fecha_muerte') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="fecha_muerte" id="fecha_muerte" name="fecha_muerte">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Guardar' }}</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>