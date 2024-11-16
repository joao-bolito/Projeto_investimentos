@extends('layouts.app')

@section('title', 'Listar')

@section('content')
    @foreach ($maiores_variacoes_positivas as $variacoes_positivas)
        <h1>{{$variacoes_positivas}}</h1>
    @endforeach


@endsection






