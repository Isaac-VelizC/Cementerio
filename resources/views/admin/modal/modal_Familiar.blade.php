
<div id="modal-familiar" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Datos del Familiar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                @if($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                        {{$errors->first()}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                        {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="familiar_nombre" class="form-control-label">{{ __('Nombre') }}</label>
                            <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('nombre') }}" type="text" placeholder="Nombre" id="familiar_nombre" name="nombre">
                                    @error('nombre')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="familiar-apellido" class="form-control-label">{{ __('Apellido') }}</label>
                            <div class="@error('apellido')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('apellido') }}" type="text" placeholder="Apellido" id="familiar-apellido" name="apellido">
                                    @error('apellido')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="familiar-ci" class="form-control-label">{{ __('Cedula de Identidad') }}</label>
                            <div class="@error('ci')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('ci') }}" type="text" placeholder="Cedula Identidad" id="familiar-ci" name="ci">
                                    @error('ci')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="familiar-email" class="form-control-label">{{ __('Email') }}</label>
                            <div class="@error('email')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('email') }}" type="email" placeholder="@example.com" id="familiar-email" name="email">
                                    @error('email')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="familiar.telefono" class="form-control-label">{{ __('Telefono') }}</label>
                            <div class="@error('familiar.telefono')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="tel" placeholder="40770888444" id="telefono" name="telefono" value="{{ old('telefono') }}">
                                    @error('telefono')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="familiar.direccion" class="form-control-label">{{ __('direccion') }}</label>
                            <div class="@error('familiar.direccion') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="direccion" id="direccion" name="direccion" value="{{ old('direccion') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="showInput();" data-dismiss="modal">{{ 'Guardar' }}</button>
                </div>
        </div>
      </div>
    </div>
  </div>