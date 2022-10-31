
<div id="modal_edit_nicho" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Nicho</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">X</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/nichos/edit') }} " method="POST" role="form text-left">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_nicho" id="id_nicho">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nicho_codigo" class="form-control-label">{{ __('Codigo del nicho') }}</label>
                            <div class="@error('codigo')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="codigo" id="nicho_codigo" name="codigo">
                                    @error('codigo')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nicho_precio" class="form-control-label">{{ __('Precio') }}</label>
                            <div class="@error('precio')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Cedula Identidad" id="nicho_precio" name="precio">
                                    @error('precio')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
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