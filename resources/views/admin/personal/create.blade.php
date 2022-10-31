@extends('layouts.user_type.auth')

@section('content')    
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ __('Registrar Personal') }}</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ url('/admin/personals') }}" method="POST" role="form text-left">
                @csrf
                @if($errors->any())
                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                        {{$errors->first()}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                        {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="personal_nombre" class="form-control-label">{{ __('Nombre') }}</label>
                            <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('nombre') }}" type="text" placeholder="Nombre" id="personal_nombre" name="nombre">
                                    @error('nombre')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-apellido" class="form-control-label">{{ __('Apellido') }}</label>
                            <div class="@error('apellido')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('apellido') }}" type="text" placeholder="Apellido" id="user-apellido" name="apellido">
                                    @error('apellido')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-CI" class="form-control-label">{{ __('Cedula de Identidad') }}</label>
                            <div class="@error('CI')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('CI') }}" type="text" placeholder="Cedula Identidad" id="user-CI" name="CI">
                                    @error('CI')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                            <div class="@error('email')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('email') }}" type="email" placeholder="@example.com" id="user-email" name="email">
                                    @error('email')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.telefono" class="form-control-label">{{ __('Telefono') }}</label>
                            <div class="@error('user.telefono')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="tel" placeholder="40770888444" id="number" name="telefono" value="{{ old('telefono') }}">
                                    @error('telefono')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="user.direccion" class="form-control-label">{{ __('direccion') }}</label>
                            <div class="@error('user.direccion') border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Direccion" id="name" name="direccion" value="{{ old('direccion') }}">
                                @error('direccion')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-salario" class="form-control-label">{{ __('Salario') }}</label>
                            <div class="@error('salario')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('salario') }}" type="decimal" placeholder="Salario" id="user-salario" name="salario">
                                    @error('salario')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.telefono" class="form-control-label">{{ __('Sector de trabajo') }}</label>
                            <div class="@error('user.telefono')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="sector_id" id="sector" placeholder="Seleccionar">
                                    @foreach ($sector as $item)
                                        <option value="{{ $item->id }}">{{ $item->sector }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection