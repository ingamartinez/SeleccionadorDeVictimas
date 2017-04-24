@extends('layouts.app')

@section('title', 'Dashboard')

@section('container')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Seleccionar Victimas</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="planeMachine" style="font-family: 'Pathway Gothic One';font-size: 70px;font-weight: 300;line-height: 80px; text-align: center">
                                @foreach($estudiantes as $estudiante)
                                    <div>
                                        {{$estudiante->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div id="cambiar" type="button" class="btn btn-danger btn-block" style="font-size: 3em;">¡Peligro!</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Victimas</div>
                </div>
                <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha Creación</th>
                                <th>Fecha Modificación</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estudiantes as $estudiante)
                                <tr data-id="{{$estudiante->id}}">
                                    <th scope="row">{{$estudiante->id}}</th>
                                    <td>{{$estudiante->name}}</td>
                                    <td>{{$estudiante->created_at}}</td>
                                    <td>{{$estudiante->updated_at}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

<script>
    $(document).ready(function(){
        var paises=$("#planeMachine").slotMachine({
            active	:0,
            delay: 1000,
            randomize: function(){
                return _.random(0, {{$estudiantes->count()}});

            }
        });

        $("#cambiar").click(function(){
            paises.shuffle(5);
        });
    });
</script>

@endpush