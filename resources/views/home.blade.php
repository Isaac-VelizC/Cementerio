@extends('layouts.user_type.clients')

@section('content')

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form" method="get" action="">
                <input type="text" id="search-input" placeholder="Buscar aqui....." name="query">
            </form>
        </div>
    </div>
    <!-- Search model end -->

@endsection
