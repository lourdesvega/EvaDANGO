@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Responsables</h1>
        <br>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Crear</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('usr.responsables.guardar')}}">
                    @csrf
                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" name="nombre" class="form-control  @error('nombre') is-invalid @enderror"
                                required autocomplete="nombre" autofocus>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Apellidos</label>
                        <div class="col-sm-8">
                            <input type="text" name="apellidos"
                                class="form-control  @error('apellidos') is-invalid @enderror" required
                                autocomplete="apellidos" autofocus>
                            @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-4">
                            <a href="{{route('usr.responsables.listar')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection