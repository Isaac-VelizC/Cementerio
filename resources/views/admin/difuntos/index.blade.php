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
                      <form  class="form-inline" method="get" action="{{ url('/admin/difuntos') }}">
                        <input id="search" type="text" class="bg-gradient-success btn-sm mb-0" placeholder="¿Buscar por nombre?" name="query">
                      </form>
                        <div>
                            <h5 class="text-center mb-0">Lista de Difuntos</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre completo</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cedula de Identidad</th>
                          <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha y Causa de muerte</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($difuntos->isEmpty() )
                            <tr class="align-middle text-center">
                              <td>
                                <h4>No hay datos</h4>
                              </td>
                            </tr>
                        @else
                        @foreach ($difuntos as $item)
                        <tr>
                          <td>
                            <div class="d-flex px-1 py-0">
                              <div>
                                <img src="../assets/img/difunto.png" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$item->nombre}} {{$item->apellido}}</h6>
                                <p class="text-xs text-secondary mb-0">{{$item->fecha_nacimiento}}</p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$item->difunto_ci}}</span>
                          </td>
                          <td class="align-middle text-center">
                            <p class="text-xs font-weight-bold mb-0">{{$item->fecha_muerte}}</p>
                            <p class="text-xs text-secondary mb-0"><strong>Causa:</strong> {{$item->causa_muerte}}</p>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if( $item->estado === 'E' )
                              <span class="badge badge-sm bg-gradient-success">Sepultado</span>
                            @elseif ( $item->estado === 'I' )
                              <span class="badge badge-sm bg-gradient-danger">Incinerado</span>
                            @else
                            <span class="badge badge-sm bg-gradient-primary">Almacen</span>
                            @endif
                          </td>
                          <td class="text-center">
                            <form method="post" action="{{ url('/admin/difuntos/'.$item->id ) }}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="button" value="{{$item->id}}" class=" badge badge-sm bg-gradient-black editbtn" data-target="#modal_edit_difunto">
                                <i class="fas fa-user-edit text-secondary"></i>
                              </button>
                              <button type="submit" class="badge badge-sm bg-gradient-black" @if ($item->estado != 'E' ) disabled="disabled" @endif>
                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @include('admin.difuntos.edit')
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
      var id_difunto = $(this).val();
      //alert(id_difunto);
      $('#modal_edit_difunto').modal('show');

      $.ajax({
        type: "GET",
        url: "/admin/difuntos/"+id_difunto+"/edit",
        success: function (params) {
          $('#difunto_nombre').val(params.difuntoEdit.nombre);
          $('#difunto_apellido').val(params.difuntoEdit.apellido);
          $('#difunto_ci').val(params.difuntoEdit.difunto_ci);
          $('#causa_muerte').val(params.difuntoEdit.causa_muerte);
          $('#fecha_nacimiento').val(params.difuntoEdit.fecha_nacimiento);
          $('#fecha_muerte').val(params.difuntoEdit.fecha_muerte);
          $('#id_difunto').val(params.difuntoEdit.id);
        }
      });
    });
  });
</script>
@endsection

