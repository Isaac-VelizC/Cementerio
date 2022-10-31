@extends('layouts.user_type.clients')

@section('content')
    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Info Contacto</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>Cementerio General, C7G2+F2W, Villa Imperial de Potosí</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td>(12) 345 67890</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td>info.cementerio@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Fax:</td>
                                    <td>+(12) 345 67890</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Tu nombre">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Tu Email">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Tu mensage"></textarea>
                                <button type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map">
                <div class="map">
                    <iframe
                        src="https://maps.google.com/maps?q=-19.5735286,-65.7498908&t=k&z=17&ie=UTF8&iwloc=&output=embed"
                        height="470" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection

