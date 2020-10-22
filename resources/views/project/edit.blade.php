@extends('layoutedit')

@section('title',$clientebd->idlcliente)

@section('content')

<section id="contact-page">
    <div class="container">
      <div class="center">
        <h2>Ediatr Cliente</h2>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          
          <form  method="POST" action="{{ route('cliente.update',$clientebd->idcliente,'edit') }}">
          @csrf
          
            <div class="form-group">
                <input name="IdLCliente" type="text" class="form-control" placeholder="Codigo" value="{{$clientebd->idlcliente}}" />
            </div>
  
            <div class="form-group">
                <input name="Nombre" type="text" class="form-control" placeholder="Nombre" value="{{$clientebd->nombre}}" >
            </div>
  
            <div class="form-group">
                <input name="Apellido" type="text" class="form-control" placeholder="Apellido" value="{{$clientebd->apellido}}" >
            </div>
  
            <div class="form-group">
                <input name="Cedula" type="text" class="form-control" placeholder="Cedula" value="{{$clientebd->cedula}}" > 
            </div>
  
            <div class="form-group">
                <input name="Telefono" type="number" class="form-control" placeholder="Telefono" value="{{$clientebd->telefono}}" >
            </div>
  
            <div class="form-group">
              <input name="Departamento" type="text" class="form-control" placeholder="Departamento" value="{{$clientebd->departamento}}" >
            </div>
  
            <div class="form-group">
                <textarea name="Direccion" class="form-control" placeholder="Direccion" >{{$clientebd->direccion}}</textarea>
            </div>
            <div class="form-group">
                <input name="Email" type="email" class="form-control" placeholder="Email" value="{{$clientebd->email}}" />
            </div>
            
            <div id="boton_form_client">
               <button  class="btn btn-primary btn-lg" onclick="return confirm('Estas seguro de editar el usuario')">Actualizar</button>
            </div>
  
  
          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>

@endsection