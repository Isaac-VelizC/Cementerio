@extends('layouts.user_type.auth')
@section('content')    
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h5 class="mb-0">{{ __('Formulario para el servicio') }}</h5>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ url('/admin/servicios') }}" method="POST" role="form text-left">
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
                <!--@if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                        {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif-->
                @if(Session::has('msg'))
                    <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                          {{ Session::get('msg') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                @include('admin.modal.modal_Familiar')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.familiar" class="form-control-label">{{ __('Familiar') }}</label>
                            <div class="input-group mb-3 @error('user.familiar')border border-danger rounded-3 @enderror ">
                                <select class="form-control" name="familiar_id" id="familiar" placeholder="Seleccionar">
                                    <option value="0">Selecionar</option>
                                    @foreach ($familiar as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }} {{ $item->apellido }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text bg-gradient-success"><a class="color: #fff;" type="button" data-toggle="modal" data-target="#modal-familiar">Nuevo   <i class="fa fa-user-plus"></i></a></span>
                                </div>
                                @error('familiar')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <p><span id='display'></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header pb-0">
                    <h6 class="px-0">{{ __('Datos del difunto') }}</h6>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="difunto_nombre" class="form-control-label">{{ __('Nombre del difunto') }}</label>
                            <div class="@error('difunto_nombre')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('difunto_nombre') }}" type="text" placeholder="Nombre del Difunto" id="difunto_nombre" name="difunto_nombre">
                                    @error('difunto_nombre')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="difunto_apellido" class="form-control-label">{{ __('Apellido del difunto') }}</label>
                            <div class="@error('difunto_apellido')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('difunto_apellido') }}" type="text" placeholder="Apellidos" id="difunto_apellido" name="difunto_apellido">
                                    @error('difunto_apellido')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="difunto_ci" class="form-control-label">{{ __('Cedula de Identidad') }}</label>
                            <div class="@error('difunto_ci')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('difunto_ci') }}" type="text" placeholder="Cedula Identidad" id="difunto_ci" name="difunto_ci">
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
                            <label for="personal_fecha_nacimiento" class="form-control-label">{{ __('Fecha de nacimiento') }}</label>
                            <div class="@error('fecha_nacimiento')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('fecha_nacimiento') }}" type="date" placeholder="fecha_nacimiento" id="personal_fecha_nacimiento" name="fecha_nacimiento">
                                    @error('fecha_nacimiento')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-fecha_muerte" class="form-control-label">{{ __('Fecha de muerte') }}</label>
                            <div class="@error('fecha_muerte')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('fecha_muerte') }}" type="date" placeholder="fecha_muerte" id="user-fecha_muerte" name="fecha_muerte">
                                    @error('fecha_muerte')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-causa_muerte" class="form-control-label">{{ __('Causa de muerte') }}</label>
                            <div class="@error('causa_muerte')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('causa_muerte') }}" type="text" placeholder="causa_muerte" id="user-causa_muerte" name="causa_muerte">
                                    @error('causa_muerte')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="card-header pb-0">
                    <h6 class="px-0">{{ __('Datos del Servicio') }}</h6>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.sector" class="form-control-label">{{ __('sector') }}</label>
                            <div class="@error('user.sector')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="sector_id" id="sector_id" placeholder="Seleccionar">
                                    <option value=""> Seleccione un sector</option>
                                    @foreach ($sector as $item)
                                        <option value="{{ $item->id }}"> {{ $item->sector }}</option>
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
                                <input class="form-control" value="{{ old('fecha_limite') }}" type="date" placeholder="fecha_limite" id="user-fecha_limite" name="fecha_limite">
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
               @include('admin.servicios.en_tierra')

               
                <div class="form-group">
                    <div class="mt-3">
                        <h6 class="mb-0">Confirmar Pago</h6>
                    </div>
                    <div class="form-check form-switch ps-0">
                        <input class="form-check-input mt-1 ms-auto" name="estado_pago" type="checkbox">
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
    function showInput() {
        var detalle = document.getElementById('display');
        var nombre_familiar = document.getElementById("familiar_nombre");
        var apellido_familiar = document.getElementById("familiar-apellido");
        var ci_familiar = document.getElementById("familiar-ci");
        var email_familiar = document.getElementById("familiar-email");
        var telefono = document.getElementById("telefono");
        var direccion = document.getElementById("direccion");

        detalle.innerHTML = "<strong> Nombre: </strong> " + nombre_familiar.value + " " + apellido_familiar.value + "<br>" +
                            "<strong>Cedula Identidad: </strong>" + ci_familiar.value + "<br>" +
                            "<strong>E-mail: </strong>" + email_familiar.value + "<br>" +
                            "<strong>Direccion: </strong>" + direccion.value + " <strong>Telefono: </strong>" + telefono.value;
    }

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
