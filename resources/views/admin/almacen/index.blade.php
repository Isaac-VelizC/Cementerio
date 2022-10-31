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
                        <div>
                            <h5 class="mb-0">Lista del almacen</h5>
                        </div>
                        <form  class="form-inline" method="get" action="{{ url('/admin/almacens') }}">
                          <input id="search" type="text" class="bg-gradient-success btn-sm mb-0" placeholder="Fecha.." name="query">
                        </form>
                        <a href="{{ url('/admin/almacens/create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New </a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Info Difunto</th>
                          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Fecha</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de ingreso a Almacen</th>
                          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Sector</th>
                          <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7 ps-2">Dias</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($almacens as $item)
                        <tr>
                          <td>
                            <div class="d-flex px-1 py-0">
                              <div>
                                <img src="../assets/img/User_perfil.png" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$item->servicio->difunto->nombre}} {{$item->servicio->difunto->apellido}}</h6>
                                <p class="text-xs text-secondary mb-0">{{$item->servicio->difunto->difunto_ci}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs text-secondary mb-0"><b>Registro:</b> {{$item->servicio->fecha_registro}}</p>
                            <p class="text-xs text-secondary mb-0"><b>Limite:</b> {{$item->servicio->fecha_limite}}</p>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$item->fecha}}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$item->servicio->sector->sector}}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">
                              <p class="text-xs text-secondary mb-0"><?php 
                              $date1 = new DateTime($item->fecha);
                              $date2 = new DateTime("2022-10-29");
                              $diff = $date1->diff($date2);
                              echo $diff->days . ' Dias '; ?></p>
                            </span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if( $item->estado === 'N' )
                              <span class="badge badge-sm bg-gradient-success">Almacen</span>
                            @else
                            <span class="badge badge-sm bg-gradient-danger">Incinerado</span>
                            @endif
                          </td>
                          <td class="text-center">
                            <form method="post" action="{{ url('/admin/almacens/'.$item->id ) }}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <input type="hidden" name="id_difunto" value="{{$item->servicio->difunto->id}}">
                              <input type="hidden" name="id_servicio" value="{{$item->servicio->id}}">
                              <button type="button" value="{{$item->id}}" class=" badge badge-sm bg-gradient-black editbtn">
                                <i class="fas fa-trash text-primary"></i>
                              </button>
                              <button type="submit" class="badge badge-sm bg-gradient-black">
                                <i class="cursor-pointer fas fa-fire text-danger"></i>
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
@endsection