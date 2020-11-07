<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facturaBD;
use App\Models\factdetalleDB;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class Messagefactura extends Controller
{
    public function store()
    {
        
        $aux=request('idlfactura');
        $auxiva=0.00;
        $auxdescuento=0.00;
        $auxsubtotal=0.00;
        $auxtotal=0.00;

        request()->validate([
            'idlfactura' => 'required',
            'fecha'  => 'required',
        ]);

        facturaBD::create([
            'idlfactura' => request('idlfactura'),
            'fechafactura' => request('fecha'),
            'iva' => $auxiva,
            'descuento' => $auxdescuento,
            'subtotal' => $auxsubtotal,
            'total' => $auxtotal,
            'idcliente' => request('idlcliente'),
            'idempleado' => request('idlempleado'),

        ]);

        $factura = facturaBD::where('idlfactura', $aux)->first();

        return redirect()->route('factura.vistafactura',$factura->idfactura);
        
    }

}
