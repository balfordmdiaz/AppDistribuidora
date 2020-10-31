@extends('layout')

@section('title','Factura')

@section('content')
<br>
<br>
<br>
<div class="text-center">
<h2>Opcion de Factura</h2>
</div>
<div id="boton_nuevoFactura">
    <div class="text-center">
         <h5>Nueva Factura</h5>
         <a href="{{ route('factura.insertar') }}"><i class="fa fa-plus fa-3x"></i></a>
         
    </div>
</div>


@endsection
   