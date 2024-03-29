@extends('master')

@section('title','Fragance System')
@section('pageTitle', 'Evaluacion')

@section('content')

    <div class='Escala row mt-4'>
        <div class='col-12'>
            <h3>
                {{$productor->nombre}}
            </h3>
            <h5 class='text text-secondary'>
                Creacion escala
            </h5>
            <div class='row'>
                <form action='/Evaluacion/creacion-escala/create/{{$productor->id}}' method='post'>
                    <div class='col-12 my-3'>
                        <p>
                            Rango inicial
                        </p>
                        <input type='text' name='rango_inicial' placeholdre='Rango inicial'>
                    </div>
                    <div class='col-6 my-3'>
                        <p>
                            Rango final
                        </p>
                        <input type='text' name='rango_final' placeholdre='Rango final'>
                        {{ csrf_field() }}
                        <button type='submit' class="btn btn-info mt-3">
                            Crear escala
                        </button>
                    </div>
                    <div class='col'>
                        <p>
                            {{$errorMessage}}
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
