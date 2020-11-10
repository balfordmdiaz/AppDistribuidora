<?php

namespace App\Http\Controllers;

use App\Models\factdetalleDB;
use App\Models\facturaBD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Barryvdh\DomPDF\Facade as PDF;

class FactDetalleController extends Controller
{
    public function index($id)
    {
        return view('project.vistafactura',[
            'facturabd'=> facturaBD::findOrFail($id)
        ]);
    }

    public function facturador($id)
    {
        return view('facturar.facturapdf',[
            'facturabd'=> facturaBD::findOrFail($id)
        ]);
    }

    public function descargar($id)
    {
        $pdf=PDF::loadview('facturar.facturapdf',[
            'facturabd'=> facturaBD::findOrFail($id)
        ]);   

        $nombre = facturaBD::where('idfactura', $id)->first();
        //$pdf->render();
        return $pdf->download($nombre->idlfactura.".pdf");
    }

    public function store()
    {
        $aux=request('idlfactura');
        $factura = facturaBD::where('idlfactura', $aux)->first();

        switch (request()->input('action')) {
            case 'agregar':

                     request()->validate([
                         'cantidad' => 'required|numeric|gt:0',
                         'total' => 'required|numeric|gt:0',
                     ]);

             
                     factdetalleDB::create([
             
                         'cantidad' => request('cantidad'),
                         'precio' => request('precio'),
                         'monto' => request('monto'),
                         'idarticulo' => request('idlarticulo'),
                         'idfactura' => $factura->idfactura,
             
                     ]);

                     $ivabd=$factura->iva;
                     $descuentobd=$factura->descuento;

                     $subtotalbd = $factura->subtotal;
                     $totalbd = $factura->total;

                     $montoform = request('monto');
                     $totalform = request('total');

                     $subtotalbd = $subtotalbd+$montoform;
                     $totalbd = $totalbd+$totalform;


                     if($ivabd>0) //si tiene iva lo tiene que actualizar
                     {
                        $ivabd=$subtotalbd*0.15;
                        facturaBD::where('idfactura', $factura->idfactura)
                        ->update([
                            'iva' => $ivabd,

                        ]);
                     }

       
                     $totalbd=($subtotalbd+$ivabd)-$descuentobd;


                     facturaBD::where('idfactura', $factura->idfactura)
                     ->update([
                         'subtotal' => $subtotalbd,
                         'total' => $totalbd,
                         
                     ]);


                     return back();
                break;
    
            case 'descuento':
                     $subtotalbd = $factura->subtotal;
                     $descuentobd = request('descuento');
                     $ivabd=$factura->iva;
                     
                     if($subtotalbd>$descuentobd) //si el descuento es igual o mayor al subtotal que no haga cambios
                     {
                        $totalbd=($subtotalbd+$ivabd)-$descuentobd;
                     
                        facturaBD::where('idfactura', $factura->idfactura)
                        ->update([
                            'descuento' => $descuentobd,
                            'total' => $totalbd,
                            
                        ]);

                     } 

                     return back();
                break;

            case 'iva':
                     $subtotalbd = $factura->subtotal;
                     $ivabd = request('Iva');
                     $descuentobd=$factura->descuento;
                    
                     $totalbd = ($subtotalbd+$ivabd)-$descuentobd;

                     facturaBD::where('idfactura', $factura->idfactura)
                     ->update([
                         'iva' => $ivabd,
                         'total' => $totalbd,
                         
                     ]);

                     return back();
               break;

            case 'facturar':
                     return redirect()->route('factura.facturar',$factura->idfactura);
                break;
    

        }

    }
}
