@extends('layouts.user_type.clients')

@section('content')    

    <div class="breadcrumb-section">
        <div class="container12">
            <div class="rows">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <div class="bt-option">
                            <span>Informacion de la Sepultura</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @foreach ($servicioShow as $item)
    <div class="container">
        <div class="contact-text">
            <table>
                <tbody>
                    <tr>
                        <td>Nombre-completo: {{ $item->difunto->nombre }} {{ $item->difunto->apellido }}</td>
                    </tr>
                    <tr>
                        <td>Causa-muerte: {{ $item->difunto->causa_muerte }}</td>
                    </tr>
                    <tr>
                        <td>Sector: {{ $item->sector->sector }}</td>
                    </tr>
                    @if ($item->nicho_id != null)    
                        <tr>
                            <td>Pabellon: {{ $item->nicho->pabellon->codigo }}</td>
                        </tr>
                        <tr>
                            <td>Numero de nicho: {{ $item->nicho->codigo }}</td>
                        </tr>
                    @else
                        <div></div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
    <br>
@endsection




