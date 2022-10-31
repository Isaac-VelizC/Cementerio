@extends('layouts.user_type.clients')

@section('content')    
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="rows">
                <div class="col-lg-12">
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div class="breadcrumb-text">
                        <h2>Resultados de busqueda</h2>
                        <div class="bt-option">
                            <span>Se encontraron {{ $difunto->count() }}  resultados para el término: {{$query}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @foreach ($difunto as $key => $item)
                    <div class="blog-item set-bg" data-setbg="https://previews.123rf.com/images/hanohiki/hanohiki1707/hanohiki170700210/82400767-l%C3%A1pida-cruz-de-piedra-en-el-cementerio-cementerio.jpg">
                        <div class="bi-text">
                            <span class="b-tag"><a href="{{ url('/search/'.$item->id.'/info') }}">Info</a></span>
                            <h4>{{$item->nombre}} {{$item->apellido}}</h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> {{$item->fecha_muerte}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-12">
                    <div class="load-more">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection




