@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Depósitos</h1>
        <br>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Crear</h6>
            </div>
            <div class="card-body">
                <form action="{{route('adm.depositos.guardar')}}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror" required
                                autocomplete="nombre" autofocus>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Zona</label>
                        <div class="col-sm-6">
                            <select name="zona_id" class="form-control">
                                @foreach ($zonas as $zona)
                                <option value="{{$zona->id}}">{{$zona->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Estado</label>
                        <div class="col-sm-6">
                            <select name="estado" class="form-control">
                                <option>Aguascalientes</option>
                                <option>Baja California</option>
                                <option>Baja California Sur</option>
                                <option>Campeche</option>
                                <option>Chiapas</option>
                                <option>Chihuahua</option>
                                <option>Ciudad de México</option>
                                <option>Coahuila</option>
                                <option>Colima</option>
                                <option>Durango</option>
                                <option>Estado de México</option>
                                <option>Guanajuato</option>
                                <option>Guerrero</option>
                                <option>Hidalgo</option>
                                <option>Jalisco</option>
                                <option>Michoacán</option>
                                <option>Morelos</option>
                                <option>Nayarit</option>
                                <option>Nuevo León</option>
                                <option>Oaxaca</option>
                                <option>Puebla</option>
                                <option>Querétaro</option>
                                <option>Quintana Roo</option>
                                <option>San Luis Potosí</option>
                                <option>Sinaloa</option>
                                <option>Sonora</option>
                                <option>Tabasco</option>
                                <option>Tamaulipas</option>
                                <option>Tlaxcala</option>
                                <option>Veracruz</option>
                                <option>Yucatán</option>
                                <option>Zacatecas</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Municipio</label>
                        <div class="col-sm-6">
                            <input type="text" name="municipio"
                                class="form-control @error('municipio') is-invalid @enderror" required
                                autocomplete="municipio" autofocus>
                            @error('municipio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Encargado</label>
                        <div class="col-sm-6">
                            <select name="user_id" class="form-control">

                                <option value=""></option>

                                @foreach ($usuarios as $usuario)
                                <option value="{{$usuario->id}}">{{$usuario->name}} {{$usuario->apellidos}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-4">
                            <a href="{{route('adm.depositos.listar')}}" class="btn btn-danger">Cancelar</a>
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