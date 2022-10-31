@extends('layouts.user_type.auth')

@section('content')    
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ __('Profile Information') }}</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ url('/admin/reserva/'.$editDifunto->id.'/edit') }} " method="POST" role="form text-left">
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
                @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                        {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                <input type="hidden" name="id_servicio" value="{{$servicio->id}}">
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
                            <label for="personal_civil" class="form-control-label">{{ __('Estado civil') }}</label>
                            <div class="@error('civil_id')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="civil_id" id="civil_id" placeholder="Seleccionar">
                                    <option value="0">Selecionar</option>
                                    @foreach ($civil as $item)
                                        <option value="{{ $item->id }}"> {{ $item->civil }}</option>
                                    @endforeach
                                </select>
                                @error('civil_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-departamento" class="form-control-label">{{ __('Departamento') }}</label>
                            <div class="@error('ciudades_id')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="ciudades_id" id="ciudades_id" placeholder="Seleccionar">
                                    <option value="0">Selecionar</option>
                                    @foreach ($ciudades as $item)
                                        <option value="{{ $item->id }}"> {{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('ciudades_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-provincia" class="form-control-label">{{ __('Provincia') }}</label>
                            <div class="@error('provincia_id')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="provincia_id" id="provincia_id" placeholder="Seleccionar"></select>
                                @error('provincia_id')
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
                                <input class="form-control" type="date" placeholder="fecha muerte" id="causa_muerte" name="causa_muerte">
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
                                <input class="form-control" type="date" placeholder="40770888444" id="fecha_nacimiento" name="fecha_nacimiento">
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
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fecha_limite" class="form-control-label">{{ __('Fecha_limite') }}</label>
                            <div class="@error('fecha_limite')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="date" placeholder="fecha limite" id="fecha_limite" name="fecha_limite">
                                    @error('fecha_limite')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="mt-3">
                                <h6 class="mb-0">Confirmar Pago</h6>
                            </div>
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input mt-1 ms-auto" name="estado_pago" type="checkbox">
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

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $("#ciudades_id").change(function(){
        var iddepartamento = $("#ciudades_id").val();
        listar_pronvincia(iddepartamento);
    })
    
    function listar_pronvincia(iddepartamento){
        $.ajax({
            type:'GET',
            url:"/admin/provincia/"+iddepartamento
        }).done(function(resp){
            var data = resp.provinciaDep;
            var cadena="";
            if(data.length>0){
                for (var i = 0; i < data.length; i++) {
                    cadena +="<option value='"+data[i].id+"'>"+data[i].nombre+"</option>";    
                }
                $("#provincia_id").html(cadena);
            }else{
                cadena +="<option value='0'>'NO SE ENCONTRARON REGISTROS'</option>";
                $("#provincia_id").html(cadena);
            }
        })
    }
</script>
@endsection