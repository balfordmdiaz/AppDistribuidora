<?php

namespace App\Http\Controllers;

use App\Models\factdetalleDB;
use App\Models\facturaBD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class FactDetalleController extends Controller
{
    public function index($id)
    {
        return view('project.vistafactura',[
            'facturabd'=> facturaBD::findOrFail($id)
        ]);
    }

    public function store()
    {

        switch (request()->input('action')) {
            case 'agregar':

                     request()->validate([
                         'cantidad' => 'required|numeric|gt:0',
                         'total' => 'required|numeric|gt:0',
                     ]);

                     $aux=request('idlfactura');
                     $factura = facturaBD::where('idlfactura', $aux)->first();
             
                     factdetalleDB::create([
             
                         'cantidad' => request('cantidad'),
                         'precio' => request('precio'),
                         'monto' => request('monto'),
                         'idarticulo' => request('idlarticulo'),
                         'idfactura' => $factura->idfactura,
             
                     ]);

                     $ivabd = $factura->iva;
                     $descuentobd = $factura->descuento;
                     $subtotalbd = $factura->subtotal;
                     $totalbd = $factura->total;

                     $ivaform = request('Iva');
                     $descuentoform = request('descuento');
                     $montoform = request('monto');
                     $totalform = request('total');

                     $ivabd = $ivabd+$ivaform;
                     $descuentobd = $descuentobd+$descuentoform;
                     $subtotalbd = $subtotalbd+$montoform;
                     $totalbd = $totalbd+$totalform;

                     facturaBD::where('idfactura', $factura->idfactura)
                     ->update([
                         'iva' => $ivabd,
                         'descuento' => $descuentobd,
                         'subtotal' => $subtotalbd,
                         'total' => $totalbd,
                         
                     ]);

                     return back();
                break;
    
            case 'finalizar':
                     return redirect()->route('factura.index');
                break;
    

        }

    }
}
