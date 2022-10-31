@extends('layouts.user_type.clients')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Cementerio general</h1>
                        <p>Fue creado durante la presidencia del Mariscal Andrés de Santa Cruz, según D.S. 
                            de Antonio José de Sucre el cual establece la implementación de cementerios en todo el territorio boliviano.</p>
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
    <!-- Hero Section End -->
    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Sobre nosotros</span>
                            <h2>Cementerio general de <br />Potosi</h2>
                        </div>
                        <p class="f-para">Sona.com is a leading online accommodation site. We’re passionate about
                            travel. Every day, we inspire and reach millions of travelers across 90 local websites in 41
                            languages.</p>
                        <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('estilos/img/hero/cememnterio-img3.jpg')}}" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('estilos/img/hero/cementerio-img1.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->
@endsection