@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <table>
                        <tbody>
                        <tr>
                            <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
                            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Fecha Registro</span><b style="color:green;font-weight:normal;margin:0">{{ $servicioShow->fecha_registro }}</b></p>
                            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Fecha Limite</span> {{ $servicioShow->fecha_limite }}</p>
                            <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Codigo Servicio</span> {{ $servicioShow->codigo }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:35px;"></td>
                        </tr>
                        <tr>
                            <td style="width:50%;padding:20px;vertical-align:top">
                            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Nombre Familiar</span> {{ $servicioShow->familiar->nombre }} {{ $servicioShow->familiar->apellido }}</p>
                            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Cedula Identidad</span> {{ $servicioShow->familiar->CI }}</p>
                            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">E-mail</span> {{ $servicioShow->familiar->email }}</p>
                            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Telefono</span> {{ $servicioShow->familiar->telefono }}</p>
                            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Direccion</span> {{ $servicioShow->familiar->direccion }}</p>
                            </td>
                            <td style="width:50%;padding:20px;vertical-align:top">
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Nombre Difunto</span> {{ $servicioShow->difunto->nombre }} {{ $servicioShow->difunto->apellido }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Cedula Identidad</span> {{ $servicioShow->difunto->difunto_ci }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Fecha Muerte</span> {{ $servicioShow->difunto->fecha_muerte }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Causa Muerte</span> {{ $servicioShow->difunto->causa_muerte }}</p>
                                <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Estado Civil</span> {{ $servicioShow->difunto->civil->civil }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Sepultado</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding:15px;">
                                <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                                    <span style="display:block;font-size:13px;font-weight:normal;">{{ $servicioShow->sector->sector }}</span> 
                                    {{ $servicioShow->precio }} 
                                    @if ($servicioShow->sector_id === 1)
                                        <b style="font-size:12px;font-weight:300;"> En nombre de {{ $servicioShow->difunto->nombre }} {{ $servicioShow->difunto->apellido }} </b>
                                    @else
                                        <b style="font-size:12px;font-weight:300;"> /{{ $servicioShow->nicho->pabellon->codigo }}/{{ $servicioShow->nicho->codigo }}</b>
                                    @endif
                                </p>
                            </td>
                        </tr>
                        </tbody>
                        <tr>
                            <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                            <strong style="display:block;margin:0 0 10px 0;">{{ auth()->user()->name }}</strong> <br> Cementerio General - Pin/Zip - 735221, Potosi<br><br>
                            <b>Telefono:</b> 03552-222011<br>
                            <b>Email:</b> {{ auth()->user()->email }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection