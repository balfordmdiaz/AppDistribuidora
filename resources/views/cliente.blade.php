@extends('layout')

@section('title','cliente')
@section('content')
<br>
<br>
@include('partials.formulariocliente')

<ul>
    @forelse($cliente as $clienteItem)
         <li><a href="{{ route('cliente.show',$clienteItem->idcliente) }}"> {{ $clienteItem->idcliente }} {{ $clienteItem->idlcliente }} {{$clienteItem->nombre}} </a></li>
    @empty
         <li>No hay clientes para mostrar</li>
    @endforelse
</ul>

@endsection