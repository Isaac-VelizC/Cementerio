@extends('layouts.user_type.auth')

@section('content')    
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">{{ __('Registrar en el almacen') }}</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ url('/admin/almacens') }}" method="POST" role="form text-left">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user.servicio" class="form-control-label">{{ __('Seleccionar el servicio') }}</label>
                            <div class="@error('user.servicio')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="servicio_id" id="servicio" placeholder="Seleccionar">
                                    @foreach ($servicio as $item)
                                        <option value="{{ $item->id }}">{{ $item->codigo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="personal_fecha" class="form-control-label">{{ __('Fecha') }}</label>
                            <div class="@error('fecha')border border-danger rounded-3 @enderror">
                                <input class="form-control" value="{{ old('fecha') }}" type="date" placeholder="fecha" id="personal_fecha" name="fecha">
                                    @error('fecha')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
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