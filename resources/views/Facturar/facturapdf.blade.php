@extends('layoutpdf')

@section('title',$facturabd->idlfactura)

@section('content')


<div id="datos_empresa" style="float: left">
   <h2>Distribuidora Hermanos Diaz</h2>
   <p>Direccion Completa</p>
</div>
   <div id="datos_factura" style="float: right">
      <h3>Factura</h3>
      Nro. Factura:{{$facturabd->idlfactura}}
      <br>
      Fecha:{{$facturabd->fechafactura}}
   </div>

   <br><br><br><br>

<table id="tabladetalle">
    <thead>
         <tr>
            <th scope="col">Cantidad</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Monto</th>
         </tr>
    </thead>

   @forelse($detalle = DB::table('tbl_facturadetalle')
                          ->join('tbl_articulo', 'tbl_facturadetalle.idarticulo', '=', 'tbl_articulo.idarticulo')
                          ->join('tbl_factura', 'tbl_facturadetalle.idfactura', '=', 'tbl_factura.idfactura')
                          ->select('tbl_facturadetalle.cantidad', 'tbl_articulo.descripcion','tbl_facturadetalle.precio','tbl_facturadetalle.monto')
                          ->where('tbl_facturadetalle.idfactura', $facturabd->idfactura)
                          ->get()  as $detalleItem)    
     <tbody>
      <tr>                 
         <td>{{ $detalleItem->cantidad }}</td>
         <td>{{ $detalleItem->descripcion }}</td>
         <td>{{ $detalleItem->precio }} C$</td>
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
      <td></td>
      <th>Subtotal</th>
      <td>{{ $facturabd->subtotal }} C$</td>
   </tr>

   <tr>
      <td></td>
      <td></td>
      <th>Iva</th>
      <td>{{ $facturabd->iva }} C$</td>
   </tr>

   <tr>
      <td></td>
      <td></td>
      <th>Descuento</th>
      <td>{{ $facturabd->descuento }} C$</td>
   </tr>

   <tr>
      <td></td>
      <td></td>
      <th>Total</th>
      <td>{{ $facturabd->total }} C$</td>
   </tr>

</table>

<table id="tabladetalle">

</table>
<br>
<div id="descarga">
<a href=" {{ route('factura.descargar',$facturabd->idfactura) }} ">Descargar PDF</a>
</div>




@endsection