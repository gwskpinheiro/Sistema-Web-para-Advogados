@extends('layouts.app')

@section('title', 'SIGAC - Home')

@section('content')
    <p>HOME</p>

    @if ($idade >= 18)
        <p>Você é maior de idade</p>
    @elseif ($idade == 15)
        <p>Você tem {{ $idade }} anos</p>
    @else
        <p>Error!!  </p>
    @endif


    @foreach ($frutas as $fruta)
        <p>Fruta: <strong>{{ $fruta }}</strong></p>

    @endforeach

    <x-alert tipo="success" >João é daora </x-alert>
@endsection
