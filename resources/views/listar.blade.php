@extends('layouts.app')

@section('title', 'Listar')

@section('content')
    @foreach ($lista_acoes as $lista)
        <h1>{{$lista['name']}}</h1>
    @endforeach


@endsection






