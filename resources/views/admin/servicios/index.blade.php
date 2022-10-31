@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                @if(Session::has('msg'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                          {{ Session::get('msg') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                <div class="card-header pb-0">
                  <div class="d-flex flex-row justify-content-between">
                    <form  class="form-inline" method="get" action="{{ url('/admin/servicios') }}">
                      <input id="search" type="text" class="bg-gradient-success btn-sm mb-0" placeholder="¿Buscar por fecha?" name="query">
                    </form>
                    <div>
                      <h5 class="mb-0">Lista de Servicios</h5>
                    </div>
                    <a href="{{ url('/admin/servicios/create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New </a>
                  </div>
              </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Codigo</th>
                          <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Cliente</th>
                          <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Difunto</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fechas</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dias</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pago</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($servicios as $item)
                        <tr>
                          <td class="align-middle text-center">
                            <a href="{{ url('/admin/servicios/'.$item->id.'/show') }}">
                              <span class="text-secondary text-xs font-weight-bold">{{$item->codigo}}</span>
                            </a>
                          </td>
                          <td>
                            <div class="d-flex px-1 py-0">
                              <div>
                                <img src="../assets/img/User_perfil.png" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$item->familiar->nombre}} {{$item->familiar->apellido}}</h6>
                                <p class="text-xs text-secondary mb-0">CI: {{$item->familiar->CI}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex px-1 py-0">
                              <div>
                                <img src="../assets/img/difunto.png" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$item->difunto->nombre}} {{$item->difunto->apellido}}</h6>
                                <p class="text-xs text-secondary mb-0">CI: {{$item->difunto->difunto_ci}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex px-1 py-0">
                              <div class="d-flex flex-column justify-content-center">
                                <p class="text-xs text-secondary mb-0"> <b>Registro:</b> {{$item->fecha_registro}}</p>
                                <p class="text-xs text-secondary mb-0"> <b>Limite:</b> {{$item->fecha_limite}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex px-1 py-0">
                              <div class="d-flex flex-column justify-content-center">
                                <p class="text-xs text-secondary mb-0"><?php 
                                  $fecha = $item->fecha_limite;
                                  $fechahoy =  date("Y-m-d");
                                  $resta = strtotime($fechahoy)-strtotime($fecha);
                                  $dias = $resta / (24*3600);
                                  echo $dias." Dias"; ?></p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if( $item->estado_pago === true )
                              <span class="badge badge-sm bg-gradient-success">Pagado</span>
                            @else
                            <span class="badge badge-sm bg-gradient-danger">No pagado</span>
                            @endif
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if( $item->estado === 'A' )
                              <span class="badge badge-sm bg-gradient-success">Sepultado</span>
                            @elseif ( $item->estado === 'I' )
                              <span class="badge badge-sm bg-gradient-dark">Incinerado</span>
                            @else
                            <span class="badge badge-sm bg-gradient-primary">Almacen</span>
                            @endif
                          </td>
                          <td class="text-center">
                            <form method="post" action="{{ url('/admin/servicios/'.$item->id ) }}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <input type="hidden" name="id_difunto" value="{{$item->difunto->id}}">
                              <a href="{{ url('/admin/send/'.$item->id) }}" class="btn btn-info badge badge-sm bg-gradient-black">
                                <i class="fa fa-envelope text-black"></i>
                              </a>
                              <a href="{{ url('/admin/servicios/'.$item->id.'/edit') }}" class="btn btn-info badge badge-sm bg-gradient-black" target="_blank">
                                <i class="fa fa-pencil text-black"></i>
                              </a>
                              <button type="submit" class="btn-info badge badge-sm bg-gradient-black" @if ($item->estado_pago === false || $item->estado != 'A' ) disabled="disabled" @endif>
                                X
                              </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
      var id_difunto = $(this).val();
      $('#modal_edit_service').modal('show');

      $.ajax({
        type: "GET",
        url: "/admin/servicios/"+id_difunto+"/edit",
        success: function (params) {
          $('#codigo').val(params.servicioEdit.codigo);
          $('#difunto_apellido').val(params.servicioEdit.apellido);
          $('#difunto_ci').val(params.servicioEdit.difunto_ci);
          $('#causa_muerte').val(params.servicioEdit.causa_muerte);
          $('#fecha_nacimiento').val(params.servicioEdit.fecha_nacimiento);
          $('#fecha_muerte').val(params.servicioEdit.fecha_muerte);
          $('#id_difunto').val(params.servicioEdit.id);
        }
      });
    });
  });
</script>
@endsection