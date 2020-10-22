@extends('layoutshow')

@section('title','cliente')
@section('content')
<br>
<br>
<br>

<div class="page-header popular-tags">
<div class="text-center">
     <h5>Nuevo cliente</h5>
     <a href="{{ route('cliente.insertar')}}"><i class="fa fa-plus fa-3x"></i></a>
</div>
</div>



<table id="tablacliente" class="table table-bordered table-hover">
     <thead>
          <tr>
             <th scope="col">Id</th>
             <th scope="col">Codigo</th>
             <th scope="col">Nombre</th>
             <th scope="col">Departamento</th>
             <th scope="col">Accion</th>
          </tr>
     </thead>

@forelse($cliente as $clienteItem)
     
     <tbody>
       <tr>        
          <th scope="row">{{ $clienteItem->idcliente }}</th>          
          <td>{{ $clienteItem->idlcliente }}</td>
          <td>{{ $clienteItem->nombre }}</td>
          <td>{{ $clienteItem->departamento }}</td>
          <td>
               <a href="{{ route('cliente.edit',$clienteItem->idcliente,'edit') }}" >Editar</a>
               <a href="{{ route('cliente.show',$clienteItem->idcliente) }}">Detalles</a>
          </td> 
       </tr>
          
@empty
       <tr>
         <td>
              <p>No hay clientes para mostrar</p>
         </td>
       </tr>

@endforelse
    </tbody>
</table>



<!--Lo comento para no desechar este codigo
<ul>
    @forelse($cliente as $clienteItem)
         <li><a href="{{ route('cliente.show',$clienteItem->idcliente) }}"> {{ $clienteItem->idcliente }} {{ $clienteItem->idlcliente }} {{$clienteItem->nombre}} </a></li>
    @empty
         <li>No hay clientes para mostrar</li>
    @endforelse
</ul>
-->

@endsection