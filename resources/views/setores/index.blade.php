@extends('setores.layout')
@section('content')
    <div class="container mt-3">
        <h1 class="jumbotron-heading">Setores</h1>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($setores as $setor)
                    <div class="col-md-6 mt-1">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">{{$setor->espsim}}</h5>
                                <a href="{{route('senha.emissao',['pri' => 'N','set' => $setor->codigo])}}" class="btn btn-primary">Normal</a>
                                <a href="{{route('senha.emissao',['pri' => 'P','set' => $setor->codigo])}}" class="btn btn-danger">Prioridade</a> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection