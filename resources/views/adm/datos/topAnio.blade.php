@extends('layouts.app')
@section('content')

<h1 class="h3 mb-2 text-gray-800 text-center">Top depósitos del año {{$anio}} </h1>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title" style="color: blue">Nacional</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="color: green">Riesgo bajo</div>
                    <div class="col" style="color: green">%</div>
                    <div class="col" style="color: rgb(226, 248, 30)">Riesgo bajo con observación</div>
                    <div class="col" style="color: rgb(226, 248, 30)">%</div>
                    <div class="col" style="color: rgba(255, 0, 0, 0.857)">Riesgo alto</div>
                    <div class="col" style="color: rgba(255, 0, 0, 0.857)">%</div>
                </div>

                @php
                $rb =$depositos->sortByDesc('rb')->take(5);
                $rbo =$depositos->sortByDesc('rbo')->take(5);
                $ra =$depositos->sortByDesc('ra')->take(5);
                @endphp

                <div class="row">

                    <div class="col">
                        @foreach ($rb as $rb)
                        <div class="row">
                            <div class="col">
                                {{$rb->nombre}}
                            </div>
                            <div class="col">
                                {{$rb->rb}}
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="col">
                        @foreach ($rbo as $rbo)

                        <div class="row">
                            <div class="col">
                                {{$rbo->nombre}}
                            </div>
                            <div class="col">
                                {{$rbo->rbo}}
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="col">
                        @foreach ($ra as $ra)

                        <div class="row">
                            <div class="col">
                                {{$ra->nombre}}
                            </div>
                            <div class="col">
                                {{$ra->ra}}
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@foreach (App\Zona::all() as $zona)
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title" style="color: blue">{{$zona->nombre}} </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="color: green">Riesgo bajo</div>
                    <div class="col" style="color: green">%</div>
                    <div class="col" style="color: rgb(226, 248, 30)">Riesgo bajo con observación</div>
                    <div class="col" style="color: rgb(226, 248, 30)">%</div>
                    <div class="col" style="color: rgba(255, 0, 0, 0.857)">Riesgo alto</div>
                    <div class="col" style="color: rgba(255, 0, 0, 0.857)">%</div>
                </div>

                @php
                $rb =$depositos->where('ID',$zona->id)->sortByDesc('rb')->take(5);
                $rbo =$depositos->where('ID',$zona->id)->sortByDesc('rbo')->take(5);
                $ra =$depositos->where('ID',$zona->id)->sortByDesc('ra')->take(5);
                @endphp

                <div class="row">

                    <div class="col">
                        @foreach ($rb as $rb)
                        <div class="row">
                            <div class="col">
                                {{$rb->nombre}}
                            </div>
                            <div class="col">
                                {{$rb->rb}}
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="col">
                        @foreach ($rbo as $rbo)

                        <div class="row">
                            <div class="col">
                                {{$rbo->nombre}}
                            </div>
                            <div class="col">
                                {{$rbo->rbo}}
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="col">
                        @foreach ($ra as $ra)

                        <div class="row">
                            <div class="col">
                                {{$ra->nombre}}
                            </div>
                            <div class="col">
                                {{$ra->ra}}
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endforeach
@endsection