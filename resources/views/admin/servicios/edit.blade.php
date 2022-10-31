@extends('layouts.user_type.auth')
@section('content')    
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h5 class="mb-0">{{ __('Editar Informacion') }}</h5>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ url('/admin/servicios/'.$servicioEdit->id.'/edit') }}" method="POST" role="form text-left">
                @csrf
                @if($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                        {{$errors->first()}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                @if(Session::has('msg'))
                    <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                          {{ Session::get('msg') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.sector" class="form-control-label">{{ __('sector') }}</label>
                            <div class="@error('user.sector')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="sector_id" id="sector_id" placeholder="Seleccionar">
                                    <option value=""> Seleccione un sector</option>
                                    @foreach ($sector as $item)
                                        <option value="{{ $item->id }}" @if($item->id == old('sector_id', $servicioEdit->sector_id)) selected @endif> {{ $item->sector }}</option>
                                    @endforeach
                                </select>
                                @error('sector')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-fecha_limite" class="form-control-label">{{ __('Fecha limite') }}</label>
                            <div class="@error('fecha_limite')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('fecha_limite', $servicioEdit->fecha_limite) }}" type="date" placeholder="fecha_limite" id="user-fecha_limite" name="fecha_limite">
                                    @error('fecha_limite')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div id="detallesNichos" style="display:none;">
                    @include('admin.servicios.nichos')
               </div>
               <br>
               
               <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="hidden" name="id_nicho" id="id_nicho" @if ($servicioEdit->nicho_id) value="{{ old('id_nicho', $servicioEdit->nicho_id) }}" @else value="#id_nicho" @endif >
                            <label for="nicho_precio">{{ 'Precio' }}</label>
                            <input class="form-control" value="{{ old('precio', $servicioEdit->precio) }}" type="decimal" placeholder="precio" id="nicho_precio" name="precio">
                        </div>
                    </div>
                    <div class="col-md-8">    
                        <div class="form-group">
                            <label for="descripcion">{{ 'Descripcion' }}</label>
                            <div class="@error('user.descripcion') border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="" rows="3" placeholder="Descripcion de la tumba" name="descripcion">{{$servicioEdit->descripcion}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($servicioEdit->estado_pago === false)    
                    <div class="form-group">
                    <div class="mt-3">
                        <h6 class="mb-0">El servicio No esta pagado!!</h6>
                    </div>
                    <div class="form-check form-switch ps-0">
                        <label for="">Confimar Pago</label>
                        <input class="form-check-input mt-1 ms-auto" name="estado_pago" type="checkbox">
                    </div>
                </div>
                @else
                    <div></div>
                @endif
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Guardar' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#sector_id").click(function(){
            seleccionSector();
        });
    });
    function seleccionSector() {
        sector_id = $("#sector_id").val();
        if (sector_id == '2') {
            mostrarNicho();
        } else {
            cerrarNicho();
        }
    }
    function mostrarNicho() {
        div = document.getElementById('detallesNichos');
        div.style.display = '';
    }
    
    function cerrarNicho() {
        div = document.getElementById('detallesNichos');
        div.style.display = 'none';
    }

</script>
@endsection
