@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
              <div class="card mb-4">
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
                        <form  class="form-inline" method="get" action="{{ url('/admin/personals') }}">
                          <input id="search" type="text" class="bg-gradient-success btn-sm mb-0" placeholder="¿Buscar por fecha?" name="query">
                        </form>
                        <div>
                            <h5 class="mb-0">Lista de pagos de servicios</h5>
                        </div>
                        <a class="btn bg-gradient-primary btn-sm mb-0" type="button" data-toggle="modal" data-target="#modal_pagos">+ Nuevo</a>
                    </div>
                </div>
                @include('admin.modal.modal_pago')
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre del Trabajador</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cedula de Identidad</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contacto</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sector</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pagos as $item)
                        <tr>
                          <td>
                            <div class="d-flex px-1 py-0">
                              <div>
                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                              </div>
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$item->nombre}} {{$item->apellido}}</h6>
                                <p class="text-xs text-secondary mb-0">{{$item->direccion}}</p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$item->CI}}</span>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$item->email}}</p>
                            <p class="text-xs text-secondary mb-0">{{$item->telefono}}</p>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if( $item->estado === 'A' )
                              <span class="badge badge-sm bg-gradient-success">Activo</span>
                            @else
                            <span class="badge badge-sm bg-gradient-danger">Inactivo</span>
                            @endif
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{$item->sectors->sector}}</span>
                          </td>
                          <td class="text-center">
                              <a href="{{ url('/admin/personals/'.$item->id.'/edit') }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                <i class="fas fa-user-edit text-secondary"></i>
                              </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $pagos->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

@endsection