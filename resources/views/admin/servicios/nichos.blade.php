
<style>
@include('admin.nichos.style');
</style>

      <h1>NICHOS</h1>
      <div class="pc-tab">
        <input checked="checked" id="tab1" type="radio" name="pct">
        <input id="tab2" type="radio" name="pct">
        <input id="tab3" type="radio" name="pct">
        <nav>
          <ul>
            <li class="tab1">
              <label for="tab1">A101</label>
            </li>
            <li class="tab2">
              <label for="tab2">B201</label>
            </li>
            <li class="tab3">
              <label for="tab3">C301</label>
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
                            @if ($item->estado == 'O' || $item->estado == 'R')
                              <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                                  <i class="fa fa-ankh opacity-10"></i>
                              </div>
                            @else
                              <button type="button" value="{{$item->id}}" class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg nichobtn">
                                <i class="fa fa-user opacity-10"></i>
                              </button>
                            @endif
                        </div>
                        <div class="card-body pt-0 p-2 text-center">
                          <h6 class="text-center mb-0">{{ $item->numero }}</h6>
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
                        @if ($item->estado == 'O' || $item->estado == 'R')
                          <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                            <i class="fa fa-ankh opacity-10"></i>
                          </div>
                        @else
                          <button type="button" value="{{$item->id}}" class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg nichobtn">
                            <i class="fa fa-user opacity-10"></i>
                          </button>
                        @endif
                      </div>
                      <div class="card-body pt-0 p-2 text-center">
                        <h6 class="text-center mb-0">{{ $item->numero }}</h6>
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
                        @if ($item->estado == 'O' || $item->estado == 'R' )
                          <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                            <i class="fa fa-ankh opacity-10"></i>
                          </div>
                        @else
                          <button type="button" value="{{$item->id}}" class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg nichobtn">
                            <i class="fa fa-user opacity-10"></i>
                          </button>
                        @endif
                      </div>
                      <div class="card-body pt-0 p-2 text-center">
                        <h6 class="text-center mb-0">{{ $item->numero }}</h6>
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

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(document).on('click', '.nichobtn', function () {
      var id_nicho = $(this).val();
      $.ajax({
        type: "GET",
        url: "/admin/nichos/"+id_nicho+"/estado",
        success: function (params) {
          $('#id_nicho').val(params.nichoEstado.id);
          $('#nicho_numero').val(params.nichoEstado.codigo);
          $('#nicho_precio').val(params.nichoEstado.precio);
        }
      });
    });
  });
</script>
