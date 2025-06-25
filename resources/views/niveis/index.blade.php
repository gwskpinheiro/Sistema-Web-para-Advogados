@extends('layouts.app')

@section('title', 'Níveis')

@section('content')

<h1>INDEX NIVEIS   </h1>

<button class="btn btn-primary" onclick="window.location.href='{{route('niveis.create')}}'"> Add Nivel</button>

<table class="table table-white">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
      </tr>
    </thead>
    <tbody>
        @foreach($niveis as $nivel)
            <tr>
            <td>{{$nivel->id}}</td>
            <td>{{$nivel->nome}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
