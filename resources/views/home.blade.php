@extends('layouts.app')

@section('content')
@if (auth()->user()->nivel==1)

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Asignaciones</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{App\Asignacion::where('activo', 1)->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Depósitos</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{App\Deposito::where('activo', 1)->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Encargados</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{App\User::where('activo', 1)->count()}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

Últimas actualizaciones de entrega
<br>
<div class="row">
    <br>

    <!-- Earnings (Monthly) Card Example -->


    @forelse (App\Autoevaluacion::where('estatus', 1)->latest()->take(5)->get() as $autoevaluacion)
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{$autoevaluacion->deposito->nombre}}</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <p>Periodo: {{$autoevaluacion->asignacion->mes.' de '.$autoevaluacion->asignacion->anio}}
                            </p>
                            <p>Fecha de entrega: {{$autoevaluacion->fechaConclusion->isoFormat('D [de] MMMM [de] Y')}}
                            </p>
                            <p>Encargado:
                                {{$autoevaluacion->deposito->user->name.' '.$autoevaluacion->deposito->user->apellidos}}
                            </p>
                            <p> <a href="{{route('adm.autoevaluaciones.ver', $autoevaluacion->id)}}">
                                    Ver autoevaluación <span style="color: blue">
                                        <i class="fas fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @empty
    No hay actualizaciones
    @endforelse


</div>
@elseif(auth()->user()->nivel==2)

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-10 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Autoevaluaciones</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{App\Autoevaluacion::where('activo', 1)->where('deposito_id',auth()->user()->deposito->id)->count()}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-10 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Responsables</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{App\Responsable::where('activo', 1)->where('deposito_id',auth()->user()->deposito->id)->count()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


Últimas actualizaciones de entrega
<br>
<div class="row">
    <br>

    <!-- Earnings (Monthly) Card Example -->


    @forelse (App\Autoevaluacion::where('estatus','<>',1)->where('deposito_id',auth()->user()->deposito->id)->get() as
    $autoevaluacion)
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            {{$autoevaluacion->deposito->nombre}}</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <p>Periodo:
                                {{$autoevaluacion->asignacion->mes.' de '.$autoevaluacion->asignacion->anio}}
                            </p>
                            <p>Fecha de entrega:
                                {{$autoevaluacion->asignacion->fechaEntrega->isoFormat('D [de] MMMM [de] Y')}}
                            </p>
                            <p>
                                Estatus:
                                @switch($autoevaluacion->estatus)
                                @case(0)
                                Sin completar
                                @break
                                @case(2)
                                Devuelta
                                @break
                                @endswitch
                            </p>
                            <p> <a href="{{route('usr.autoevaluaciones.listar', $autoevaluacion->id)}}">
                                    Ver autoevaluación <span style="color: blue">
                                        <i class="fas fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @empty
    No hay actualizaciones
    @endforelse
</div>
@endif


@endsection