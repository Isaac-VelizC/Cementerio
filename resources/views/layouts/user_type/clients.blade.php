@extends('layouts.client')

@section('clients')
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    @include('layouts.navbars.clients.nav')
                </div>
            </div>
        </div>
        @yield('content')
            <!-- Search model Begin -->
            <div class="search-model">
                <div class="h-100 d-flex align-items-center justify-content-center">
                    <div class="search-close-switch"><i class="icon_close"></i></div>
                    <form class="search-model-form" method="get" action="{{ url('/search') }}">
                        <input type="text" id="search" placeholder="Buscar aqui....." name="query">
                    </form>
                </div>
            </div>
            <!-- Search model end -->
        @include('layouts.footers.clients.footer')
@endsection
