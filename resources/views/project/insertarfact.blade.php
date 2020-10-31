@extends('layout')

@section('title','Insertar')

@section('content')
<br>
<br>
@include('partials.formulariofactura')

<script>
    function ShowSelected()
    {
     //obtener el id articulo seleccionado
     var elementos = document.getElementById('idlarticulo').value;
    
     if(elementos>0)
     {
     const art = {!! json_encode($articulo ?? '') !!};
     console.log(art);
     var precioaux=art[elementos-1].precio;
     document.getElementById('precio').value=precioaux;

     var cantidadaux=document.getElementById('cantidad').value;
     var subtotalaux=precioaux*cantidadaux;


     document.getElementById('subtotal').value=subtotalaux;
     if(document.getElementById('chec').checked)
     {
        //Este es el Iva 
        document.getElementById('boton').value=subtotalaux*0.15;         
     }
     else
     {
        document.getElementById('boton').value=0;
     }
     var auxiva= document.getElementById('boton').value;
     var auxdescuento=document.getElementById('descuento').value;
     document.getElementById('total').value=(parseFloat(subtotalaux)+parseFloat(auxiva))-parseFloat(auxdescuento);
     }
   

  };
  window.onload = ShowSelected; //para que cargue la funcion desde el principio
</script>


@endsection


