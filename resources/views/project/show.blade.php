@extends('layout')

@section('title',$clientebd->idlcliente)

@section('content')

<h2>{{ $clientebd->idlcliente }}</h2>
<p>{{ $clientebd->nombre }}</p>
<p>{{ $clientebd->apellido }}</p>
<p>{{ $clientebd->cedula }}</p>
<p>{{ $clientebd->email }}</p>
<p>{{ $clientebd->departamento }}</p>
<p>{{ $clientebd->direccion }}</p>

@endsection


