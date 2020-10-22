@extends('layoutshow')

@section('title',$clientebd->idlcliente)


@section('content')
<br>
<br>
<br>
<div style="text-align:center;">
<table class="table table-bordered table-hover">
    <tr>
      <th>Id</th>
      <td>{{ $clientebd->idlcliente }}</td>
    </tr>
    <tr>
      <th>Nombre</th>
      <td>{{ $clientebd->nombre }}</td>
    </tr>
    <tr>
      <th>Apellido</th>
      <td>{{ $clientebd->apellido }}</td>
    </tr>
    <tr>
      <th>Cedula</th>
      <td>{{ $clientebd->cedula }}</td>
    </tr>
    <tr>
        <th>Telefono</th>
        <td>{{ $clientebd->telefono }}</td>
    </tr>
    <tr>
        <th>Departamento</th>
        <td>{{ $clientebd->departamento }}</td>
    </tr>
    <tr>
        <th>Direccion</th>
        <td>{{ $clientebd->direccion }}</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{ $clientebd->email }}</td>
    </tr>

</table>
</div>

@endsection


