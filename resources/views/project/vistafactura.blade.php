@extends('layout')

@section('title',$facturabd->idlfactura)

@section('content')
<br>
<br>
<br>

<section id="contact-page">
    <div class="container">
      <div class="center">
      <h4>Agregar mas articulo {{ $facturabd->idlfactura }}</h4>
      </div>
      <div class="row contact-wrap">
        <div class="col-md-8 col-md-offset-2">
          
        <form id="formularioagregar" method="POST" action="{{ route('factura.agregar',$facturabd->idfactura,'store') }}">
         @csrf

           <div class="form-group">
                <label for="" style="float: left">Factura:</label>    
                <input name="idlfactura" type="text" class="form-control" placeholder="Codigo factura" value="{{ $facturabd->idlfactura }}" readonly="readonly">   
           </div>

           <div class="form-group">
                 <label for="" style="float: left">Empleado:</label>
                 <input name="idempleado" type="text" class="form-control" placeholder="Codigo empleado" 
                 value="{{ $idemp = DB::table('tbl_empleado')->where('idempleado', $facturabd->idempleado)->value('idlempleado') }}" readonly="readonly">
           </div>

           <div
            class="form-group">
                 <label for="" style="float: left">Cliente:</label>    
                 <input name="idlcliente" type="text" class="form-control" placeholder="Codigo cliente" 
                 value="{{ $idcliente = DB::table('tbl_clientes')->where('idcliente', $facturabd->idcliente)->value('idlcliente') }}" readonly="readonly">
           </div>

          <div class="form-group">
              <label for="" style="float: left">Articulo:</label> 
              <select  id="idlarticulo" name="idlarticulo" class="form-control" onchange="ShowSelected();">
                  @forelse($articulo = DB::table('tbl_articulo')->get() as $articuloItem)
                      <option value="{{ $articuloItem->idarticulo }}">{{ $articuloItem->idlarticulo }} {{ $articuloItem->descripcion }}</option>    
                  @empty
                      <option value="">No hay Articulo</option>
                  @endforelse               
              </select>    
          </div>

          <div class="form-group">
             <label for="" style="float: left">Cantidad:</label>
             <input name="cantidad" id="cantidad" type="number" class="form-control"  onkeyup="ShowSelected();" pattern="^[0-9]+" oninput="this.value = Math.max(this.value, 0)"/>
             {!! $errors->first('cantidad','<small>:message</small><br>') !!}
          </div>

          <div class="form-group" >
               <label for="" style="float: left">Precio:</label>
               <input name="precio" id="precio" type="number" step="any" class="form-control" readonly="readonly"/>        
          </div>

          <div class="form-group">
            <label for="" style="float: left">Monto:</label>
            <input name="monto" id="monto" type="number" step="any" class="form-control" readonly="readonly"/>       
          </div>

          <div class="form-group">
                  <input name="chec" type="checkbox" id="chec" onChange="comprobar(this);" onclick="ShowSelected();" />
                  <label for="chec">IVA(opcional)</label>
                  <input name="Iva" type="number" id="boton" class="form-control" step="any" style="display:none" placeholder="IVA" readonly="readonly"/>

                  <button type="submit" name="action" id="mas_iva" style="display:none" class="btn btn-primary btn-lg" value="iva">+ Iva</button>
          </div>

          <div class="form-group">
              <input name="chec" type="checkbox" id="chec_descuento" onChange="comprobarDescuento(this);" onclick="ShowSelected();" />
              <label for="chec">Descuento(opcional)</label>
              <input name="descuento" id="descuento" type="number" step="any" class="form-control" style="display:none" min="0" value="0" onkeyup="ShowSelected();" pattern="^[0-9]+" oninput="this.value = Math.max(this.value, 0)"/>

              <button type="submit" name="action" id="mas_descuento" style="display:none" class="btn btn-primary btn-lg" value="descuento">+ Descuento</button>
      </div>

          <div class="form-group" style="display:none">
            <label for="" style="float: left">Total:</label>
            <input id="total" name="total" type="number" step="any" class="form-control" readonly="readonly" />
            {!! $errors->first('total','<small>:message</small><br>') !!}         
          </div>

          <div id="boton_form_factura">
            <button type="submit" name="action" class="btn btn-primary btn-lg" value="facturar">Facturar</button>    
            <button type="submit" name="action" class="btn btn-primary btn-lg" value="agregar">Agregar Articulo</button>
          </div> 
           
        </form>

        <div class="center">
          <h3>Lista articulos {{ $facturabd->idlfactura }}</h3>
        </div>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>

  <div>
    

    <table id="tabladetalle" class="table table-bordered table-hover">
      <thead>
           <tr>
              <th scope="col">Id</th>
              <th scope="col">Art</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Precio</th>
              <th scope="col">Monto</th>
           </tr>
      </thead>
  
     @forelse($detalle = DB::table('tbl_facturadetalle')
                            ->join('tbl_articulo', 'tbl_facturadetalle.idarticulo', '=', 'tbl_articulo.idarticulo')
                            ->join('tbl_factura', 'tbl_facturadetalle.idfactura', '=', 'tbl_factura.idfactura')
                            ->select('tbl_factura.idlfactura', 'tbl_articulo.descripcion', 'tbl_facturadetalle.cantidad','tbl_facturadetalle.precio','tbl_facturadetalle.monto')
                            ->where('tbl_facturadetalle.idfactura', $facturabd->idfactura)
                            ->get()  as $detalleItem)
      
       <tbody>
        <tr>        
           <th scope="row">{{ $detalleItem->idlfactura }}</th>          
           <td>{{ $detalleItem->descripcion }}</td>
           <td>{{ $detalleItem->cantidad }}</td>
           <td>{{ $detalleItem->precio }}</td>
           <td>{{ $detalleItem->monto }}</td>
        </tr>
           
     @empty

     
      <tr>
        <td colspan="5"><p style="text-align: center">No hay articulos para mostrar</p> </td>
      </tr>  
     
      </tbody>

     @endforelse

     <tr>
       
       <td></td>
       <td></td>
       <th>Subtotal</th>
       <td colspan="2">{{ $facturabd->subtotal }} C$</td>
     </tr>

     <tr>
       
       <td></td>
       <td></td>
       <th>Iva</th>
       <td colspan="2">{{ $facturabd->iva }} C$</td>
     </tr>

    <tr>
       
       <td></td>
       <td></td>
       <th>Desc</th>
       <td colspan="2">{{ $facturabd->descuento }} C$</td>
    </tr>

    <tr>
       
       <td></td>
       <td></td>
       <th>Total</th>
       <td colspan="2">{{ $facturabd->total }} C$</td>
    </tr>

  </table>
  

</div>


<script>
  function ShowSelected()
  {
    
   //obtener el id articulo seleccionado
   var elementos = document.getElementById('idlarticulo').value;
   console.log(elementos);
   const subtotalbd = {!! json_encode($facturabd->subtotal ?? '') !!};
   var subtotal_aux=subtotalbd;


   if(elementos>0)
   {
   const art = {!! json_encode($articulo ?? '') !!};
   console.log(art);
   var precioaux=art[elementos-1].precio;
   document.getElementById('precio').value=precioaux;

   var cantidadaux=document.getElementById('cantidad').value;
   var montoaux=0.00;
   montoaux=precioaux*cantidadaux;

   document.getElementById('monto').value=montoaux;

   //
   if(document.getElementById('chec').checked)
   {
      //Este es el Iva 
      document.getElementById('boton').value=subtotal_aux*0.15;         
   }
   else
   {
      document.getElementById('boton').value=0;
   }

   if(document.getElementById('chec_descuento').checked)
   {
     //si el check del descunto esta habilitado
   }
   else
   {
      document.getElementById('descuento').value=0;
   }


   var auxiva= document.getElementById('boton').value;
   var auxdescuento=document.getElementById('descuento').value;
  
        if(auxdescuento==null)
        {
          auxdescuento=0.00;
          console.log(auxdescuento);
        }

   document.getElementById('total').value=parseFloat(montoaux);
   }
 

};
window.onload = ShowSelected; //para que cargue la funcion desde el principio
</script>

@endsection

