<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facturaBD;

class Messagefactura extends Controller
{
    public function store()
    {
        facturaBD::create([
            'idlfactura' => request('idlfactura'),
            'fechafactura' => request('fecha'),
            'iva' => request('Iva'),
            'descuento' => request('descuento'),
            'subtotal' => request('subtotal'),
            'total' => request('total'),
            'idcliente' => request('idlcliente'),
            'idempleado' => request('idlempleado'),

        ]);

        return redirect()->route("factura.index");
    }

}
