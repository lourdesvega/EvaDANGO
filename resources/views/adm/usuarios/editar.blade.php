@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Encargados depósitos</h1>
        <br>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('adm.usuarios.actualizar', $usuario->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                required autocomplete="nombre" value="{{$usuario->name}}" autofocus>
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
                            <input type="text" value="{{$usuario->apellidos}}" name="apellidos"
                                class="form-control @error('apellidos') is-invalid @enderror" required
                                autocomplete="apellidos" autofocus>
                            @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Correo</label>
                        <div class="col-sm-8">
                            <input type="email" value="{{$usuario->email}}" name="correo"
                                class="form-control @error('correo') is-invalid @enderror" required
                                autocomplete="correo" autofocus>
                            @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tipo usuario</label>
                        <div class="col-sm-5">
                            <select id="nivel" name="nivel" class="form-control @error('nivel') is-invalid @enderror"
                                required autocomplete="nivel" autofocus>
                                <option {{$usuario->nivel== 2 ? 'selected = "selected"' :'' }} value="2">Responsable
                                </option>
                                <option {{$usuario->nivel== 1 ? 'selected = "selected"' :'' }} value="1">Administrador
                                </option>
                                <option {{$usuario->nivel== 3 ? 'selected = "selected"' :'' }} value="3">Consultor
                                </option>
                            </select>
                            @error('nivel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Depósito</label>
                        <div class="col-sm-5">
                            <select id="deposito" name="deposito" class="form-control">
                                <option value=""></option>
                                @foreach($depositos as $deposito)
                                <option {{$deposito->user_id== $usuario->id ? 'selected="selected"': ''}}
                                    value="{{$deposito->id}}">{{$deposito->nombre}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Activo</label>
                        <div class="col-sm-3">
                            <select name="activo" class="form-control">
                                <option {{$usuario->activo== 1 ? 'selected = "selected"' :'' }} value="1">Sí
                                </option>
                                <option {{$usuario->activo== 0 ? 'selected = "selected"' :'' }} value="0">No
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-4">
                            <a href="{{route('adm.usuarios.listar')}}" class="btn btn-danger">Cancelar</a>
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


@section('scripts')
<script>
   
$(function() {

var nivel = $('#nivel');
nivel.on('change', ejecutar);
nivel.trigger('change');


function ejecutar() {
            var op = nivel.find('option:selected').val();
        if(op==2){
            $("#deposito").removeAttr("disabled");
        }else{
            $("#deposito option[value='']").attr("selected",true);
            $("#deposito").attr("disabled", "disabled");
            
        }
    }
});
</script>
@endsection