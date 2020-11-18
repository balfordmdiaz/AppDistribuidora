@extends('layoutpdf')

@section('title',$facturabd->idlfactura)

@section('content')


   <div id="datos_empresa" style="float: left">
      <h2>Distribuidora Hermanos Diaz</h2>
      <p>Direccion Completa</p>
      <p>Numero de Telefono</p>
   </div>

   <div id="datos_factura" style="float: right">
      <h3>Factura</h3>
      Nro. Factura:{{$facturabd->idlfactura}}
      <br>
      Fecha:{{$facturabd->fechafactura}}
   </div>

   <br><br><br><br>

   <div id="datos_cliente" style="">
      <h3 style="text-decoration: underline">Facturar a:</h3>
      <p><label> Nombre cliente:</label> 
         {{ $nombreclient = DB::table('tbl_clientes')->where('idcliente', $facturabd->idcliente)->value('nombre')  }} 
         {{ $apellidoclient = DB::table('tbl_clientes')->where('idcliente', $facturabd->idcliente)->value('apellido') }}</p>
      <p><label>Direccion:</label> 
         {{ $direccionclient = DB::table('tbl_clientes')->where('idcliente', $facturabd->idcliente)->value('direccion') }}</p>
      <p><label>Telefono:</label>
         {{ $telefonoclient = DB::table('tbl_clientes')->where('idcliente', $facturabd->idcliente)->value('telefono') }}</p>
      <p><label>Departemanto:</label> 
         {{ $departamentoclient = DB::table('tbl_clientes')->where('idcliente', $facturabd->idcliente)->value('departamento') }}</p>
   </div>

   <div id="datos_empleado" style="">
      <h3 style="text-decoration: underline">Facturado por:</h3>

      <p><label>Codigo Empleado:</label> 
         {{ $Direccionemp = DB::table('tbl_empleado')->where('idempleado', $facturabd->idempleado)->value('idlempleado')  }} 
      </p>

      <p><label> Nombre empleado:</label> 
         {{ $nombreemp = DB::table('tbl_empleado')->where('idempleado', $facturabd->idempleado)->value('nombre')  }} 
         {{ $apellidoemp = DB::table('tbl_empleado')->where('idempleado', $facturabd->idempleado)->value('apellido') }}
      </p>

      <p><label>Direccion:</label> 
         {{ $Direccionemp = DB::table('tbl_empleado')->where('idempleado', $facturabd->idempleado)->value('direccion')  }} 
      </p>

      <p><label>Telefono:</label> 
         {{ $telefonoemp = DB::table('tbl_empleado')->where('idempleado', $facturabd->idempleado)->value('telefono')  }} 
      </p>

   </div>


<table id="tabladetalle">
    <thead>
         <tr>
            <th scope="col">Articulo</th>
            <th scope="col">Talla</th>
            <th scope="col">color</th>
            <th scope="col">Cant</th>
            <th scope="col">Monto</th>
         </tr>
    </thead>

   @forelse($detalle = DB::table('tbl_facturadetalle')
                          ->join('tbl_articulovariante', 'tbl_facturadetalle.idarticulov', '=', 'tbl_articulovariante.idarticulov')
                          ->join('tbl_factura', 'tbl_facturadetalle.idfactura', '=', 'tbl_factura.idfactura')
                          ->join('tbl_articulostock', 'tbl_articulovariante.idarticulos', '=', 'tbl_articulostock.idarticulos')
                          ->select('tbl_articulostock.nombrearticulo','tbl_articulovariante.talla','tbl_articulovariante.color','tbl_facturadetalle.cantidad','tbl_facturadetalle.monto')
                          ->where('tbl_facturadetalle.idfactura', $facturabd->idfactura)
                          ->get()  as $detalleItem)    
     <tbody>
      <tr>                 
         <td>{{ $detalleItem->nombrearticulo }}</td>  
         <td>{{ $detalleItem->talla }}</td>  
         <td>{{ $detalleItem->color }}</td> 
         <td>{{ $detalleItem->cantidad }}</td>  
         <td>{{ $detalleItem->monto }} C$</td>
      </tr>        
   @empty
    <tr>
      <td colspan="5"><p style="text-align: center">No hay articulos para mostrar</p> </td>
    </tr>  
    </tbody>
   @endforelse

 
   <tr>
      <td></td>
      <th>Subtotal</th>
      <td colspan="3">{{ $facturabd->subtotal }} C$</td>
   </tr>

   <tr>
      <td></td>
      <th>Iva</th>
      <td colspan="3">{{ $facturabd->iva }} C$</td>
   </tr>

   <tr>
      <td></td>
      <th>Descuento</th>
      <td colspan="3">{{ $facturabd->descuento }} C$</td>
   </tr>

   <tr>
      <td></td>
      <th>Total</th>
      <td colspan="3">{{ $facturabd->total }} C$</td>
   </tr>

</table>

<div>
   <h6 style="text-align: center; font-style: italic">¡Gracias por su compra!</h6>
</div>


<div id="descarga">
    <a href=" {{ route('factura.descargar',$facturabd->idfactura) }} ">Descargar PDF</a>
</div>






@endsection