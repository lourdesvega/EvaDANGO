@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-8 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Depósitos</h1>
        <br>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('adm.depositos.actualizar', $deposito->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" name="nombre" value="{{$deposito->nombre}}"
                                class="form-control @error('municipio') is-invalid @enderror" required
                                autocomplete="municipio" autofocus>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Región</label>
                        <div class="col-sm-6">
                            <select name="zona_id" class="form-control">
                                @foreach ($zonas as $area)
                                <option {{$area->id == $deposito->area_id? 'selected="selected"':''}}
                                    value="{{$area->id}}">
                                    {{$area->nombre}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Estado</label>
                        <div class="col-sm-6">
                            <select name="estado" class="form-control">
                                <option {{$deposito->estado == 'Aguascalientes' ? 'selected="selected"':''}}>
                                    Aguascalientes</option>
                                <option {{$deposito->estado == 'Baja California' ? 'selected="selected"':''}}>Baja
                                    California</option>
                                <option {{$deposito->estado == 'Baja California Sur' ? 'selected="selected"':''}}>Baja
                                    California Sur</option>
                                <option {{$deposito->estado == 'Campeche' ? 'selected="selected"':''}}>Campeche</option>
                                <option {{$deposito->estado == 'Chiapas' ? 'selected="selected"':''}}>Chiapas</option>
                                <option {{$deposito->estado == 'Chihuahua' ? 'selected="selected"':''}}>Chihuahua
                                </option>
                                <option {{$deposito->estado == 'Ciudad de México' ? 'selected="selected"':''}}>Ciudad de
                                    México</option>
                                <option {{$deposito->estado == 'Coahuila' ? 'selected="selected"':''}}>Coahuila</option>
                                <option {{$deposito->estado == 'Colima' ? 'selected="selected"':''}}>Colima</option>
                                <option {{$deposito->estado == 'Durango' ? 'selected="selected"':''}}>Durango</option>
                                <option {{$deposito->estado == 'Estado de México' ? 'selected="selected"':''}}>Estado de
                                    México</option>
                                <option {{$deposito->estado == 'Guanajuato' ? 'selected="selected"':''}}>Guanajuato
                                </option>
                                <option {{$deposito->estado == 'Guerrero' ? 'selected="selected"':''}}>Guerrero</option>
                                <option {{$deposito->estado == 'Hidalgo' ? 'selected="selected"':''}}>Hidalgo</option>
                                <option {{$deposito->estado == 'Jalisco' ? 'selected="selected"':''}}>Jalisco</option>
                                <option {{$deposito->estado == 'Michoacán' ? 'selected="selected"':''}}>Michoacán
                                </option>
                                <option {{$deposito->estado == 'Morelos' ? 'selected="selected"':''}}>Morelos</option>
                                <option {{$deposito->estado == 'Nayarit' ? 'selected="selected"':''}}>Nayarit</option>
                                <option {{$deposito->estado == 'Nuevo León' ? 'selected="selected"':''}}>Nuevo León
                                </option>
                                <option {{$deposito->estado == 'Oaxaca' ? 'selected="selected"':''}}>Oaxaca</option>
                                <option {{$deposito->estado == 'Puebla' ? 'selected="selected"':''}}>Puebla</option>
                                <option {{$deposito->estado == 'Querétaro' ? 'selected="selected"':''}}>Querétaro
                                </option>
                                <option {{$deposito->estado == 'Quintana Roo' ? 'selected="selected"':''}}>Quintana Roo
                                </option>
                                <option {{$deposito->estado == 'San Luis Potosí' ? 'selected="selected"':''}}>San Luis
                                    Potosí</option>
                                <option {{$deposito->estado == 'Sinaloa' ? 'selected="selected"':''}}>Sinaloa</option>
                                <option {{$deposito->estado == 'Sonora' ? 'selected="selected"':''}}>Sonora</option>
                                <option {{$deposito->estado == 'Tabasco' ? 'selected="selected"':''}}>Tabasco</option>
                                <option {{$deposito->estado == 'Tamaulipas' ? 'selected="selected"':''}}>Tamaulipas
                                </option>
                                <option {{$deposito->estado == 'Tlaxcala' ? 'selected="selected"':''}}>Tlaxcala</option>
                                <option {{$deposito->estado == 'Veracruz' ? 'selected="selected"':''}}>Veracruz</option>
                                <option {{$deposito->estado == 'Yucatán' ? 'selected="selected"':''}}>Yucatán</option>
                                <option {{$deposito->estado == 'Zacatecas' ? 'selected="selected"':''}}>Zacatecas
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Municipio</label>
                        <div class="col-sm-6">
                            <input type="text" name="municipio" value="{{$deposito->municipio}}"
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
                                @forelse ($usuarios as $usuario)
                                <option {{$usuario->id == $deposito->user_id ? 'selected="selected"':''}}
                                    value="{{$usuario->id}}">
                                    {{$usuario->name}} {{$usuario->apellidos}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Activo</label>
                        <div class="col-sm-4">
                            <select name="activo" class="form-control">
                                <option {{$deposito->activo == 1 ? 'selected="selected"' : ''}} value="1">Sí</option>
                                <option {{$deposito->activo == 0 ? 'selected="selected"' : ''}} value="0">No</option>
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