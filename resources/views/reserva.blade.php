@extends('layouts.user_type.clients')

@section('content')

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @include('client.nicho_recerva')
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Reserva de Nicho</h3>
                        <form action="{{ url('/reserva') }}" method="POST" role="form text-left">
                            @csrf
                            @if ($id_usuario == 0)
                                <div class="check-date @error('nombre')border border-danger rounded-3 @enderror">
                                    <input type="text" name="nombre" id="nombre_cliente" placeholder="Nombre...">
                                    @error('nombre')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="check-date @error('apellido')border border-danger rounded-3 @enderror">
                                    <input type="text" name="apellido" id="nombre_cliente" placeholder="Apellido....">
                                    @error('apellido')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="check-date">
                                    <input type="text" name="ci" id="nombre_cliente" placeholder="Cedula Identidad....">
                                </div>
                                <div class="check-date">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @error('telefono')border border-danger rounded-3 @enderror">
                                                <input value="{{ old('telefono') }}" type="text" placeholder="Telefono" name="telefono">
                                                @error('telefono')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group @error('direccion')border border-danger rounded-3 @enderror">
                                                <input value="{{ old('direccion') }}" type="text" placeholder="Direccion" name="direccion">
                                                @error('direccion')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div></div>
                            @endif
                            <input type="hidden" name="id_nicho_reserva" id="id_nicho">
                            <input type="hidden" name="precio" id="precio">
                            <div class="check-date">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input value="{{ old('numero') }}" type="text" placeholder="numero" id="nicho_numero" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input value="{{ old('precio') }}" type="decimal" placeholder="precio" id="nicho_precio" name="precio" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit">Reservar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('estilos/img/hero/hero-1.jpg')}}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('estilos/img/hero/hero-2.jpg')}}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('estilos/img/hero/hero-3.jpg')}}"></div>
        </div>
    </section>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


@endsection
