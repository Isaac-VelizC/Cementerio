@extends('layouts.user_type.auth')

@section('content')

<style>
@include('admin.nichos.style');
</style>

<main class="main-content position-relative max-height-vh-200 h-200 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      @if(Session::has('msg'))
      <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
          <span class="alert-text text-white">
            {{ Session::get('msg') }}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <i class="fa fa-close" aria-hidden="true"></i>
          </button>
      </div>
      @endif
      <h1>NICHOS</h1>
      <div class="pc-tab">
        <input checked="checked" id="tab1" type="radio" name="pct">
        <input id="tab2" type="radio" name="pct">
        <input id="tab3" type="radio" name="pct">
        <nav>
          <ul>
            <li class="tab1">
              <label for="tab1">PAB-101</label>
            </li>
            <li class="tab2">
              <label for="tab2">PAB-201</label>
            </li>
            <li class="tab3">
              <label for="tab3">PAB-301</label>
            </li>
          </ul>
        </nav>
        <section>
          <div class="tab1">
              <div class="row">
                @foreach ($nichos as $item)
                  @if ($item->pabellon->codigo === "PAB-101")  
                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-header mx-3 p-2 text-center">
                            @if ($item->estado == 'O')
                              <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                  <i class="fa fa-ankh opacity-10"></i>
                              </div>
                            @else
                              <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                <i class="fa fa-user opacity-10"></i>
                              </div>
                            @endif
                          <button type="button" value="{{$item->id}}" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2 editbtn" data-target="#modal_edit_nicho">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                          </button>
                        </div>
                        <div class="card-body pt-0 p-2 text-center">
                          <h6 class="text-center mb-0">Numero: {{ $item->codigo }}</h6>
                          @if ($item->estado == 'O')
                            <h5 class="text-xs bg-danger">OCUPADO</h5>
                          @elseif ($item->estado == 'R')
                            <h5 class="text-xs bg-primary">RESERVADO</h5>
                          @else
                            <h5 class="text-xs bg-success">DISPONIBLE</h5>
                          @endif
                          <hr class="horizontal dark my-3">
                          <h5 class="mb-0">${{$item->precio}}</h5>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
          </div>
          <div class="tab2">
            <div class="row">
              @foreach ($nichos as $item)
                @if ($item->pabellon->codigo === "PAB-201")  
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-header mx-3 p-2 text-center">
                        @if ($item->estado == 'O')
                          <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                            <i class="fa fa-ankh opacity-10"></i>
                          </div>
                        @else
                          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fa fa-user opacity-10"></i>
                          </div>
                        @endif
                        <button type="button" value="{{$item->id}}" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2 editbtn" data-target="#modal_edit_nicho">
                          <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                        </button>
                      </div>
                      <div class="card-body pt-0 p-2 text-center">
                        <h6 class="text-center mb-0">Numero: {{ $item->codigo }}</h6>
                        @if ($item->estado == 'O')
                          <h5 class="text-xs bg-gradient-danger">OCUPADO</h5>
                        @elseif ($item->estado == 'R')
                            <h5 class="text-xs bg-primary">RESERVADO</h5>
                        @else
                          <h5 class="text-xs bg-gradient-success">DISPONIBLE</h5>
                        @endif
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">${{$item->precio}}</h5>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
          <div class="tab3">
            <div class="row">
              @foreach ($nichos as $item)
                @if ($item->pabellon->codigo === "PAB-301")  
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-header mx-3 p-2 text-center">
                        @if ($item->estado == 'O')
                          <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                            <i class="fa fa-ankh opacity-10"></i>
                          </div>
                        @else
                          <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fa fa-user opacity-10"></i>
                          </div>
                        @endif
                        <button type="button" value="{{$item->id}}" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2 editbtn" data-target="#modal_edit_nicho">
                          <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
                        </button>
                      </div>
                      <div class="card-body pt-0 p-2 text-center">
                        <h6 class="text-center mb-0">Numero: {{ $item->codigo }}</h6>
                          @if ($item->estado == 'O')
                            <h5 class="text-xs bg-gradient-danger">OCUPADO</h5>
                          @elseif ($item->estado == 'R')
                          <h5 class="text-xs bg-primary">RESERVADO</h5>
                          @else
                            <h5 class="text-xs bg-gradient-success">DISPONIBLE</h5>
                          @endif
                        <hr class="horizontal dark my-3">
                        <h5 class="mb-0">${{$item->precio}}</h5>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        </section>
      </div>
      @include('admin.nichos.edit')
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
      var id_nicho = $(this).val();
      $('#modal_edit_nicho').modal('show');
      $.ajax({
        type: "GET",
        url: "/admin/nichos/"+id_nicho+"/nichoEdit",
        success: function (params) {
          $('#nicho_codigo').val(params.nichoEdit.codigo);
          $('#nicho_precio').val(params.nichoEdit.precio);
          $('#id_nicho').val(params.nichoEdit.id);
        }
      });
    });
  });
</script>

@endsection