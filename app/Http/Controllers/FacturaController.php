<?php

namespace App\Http\Controllers;

use App\Models\clienteBD;
use App\Models\articuloBD;
use App\Models\facturaBD;
use App\Models\empleadoBD;
use App\Models\factdetalleDB;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $factura=facturaBD::orderBy('idfactura','DESC')->paginate(5);
        return view('factura',compact('factura'));
    }


    public function insertar()
    {
        $cliente=clienteBD::get();
        $articulo=articuloBD::get();
        $factura=facturaBD::latest('idfactura')->first();
        $empleado=empleadoBD::get();
        $detalle=factdetalleDB::get();
        if(!$factura)
        {
            $factura=new facturaBD();
            $factura->idfactura=0;
        }
        return view('project.insertarfact',compact('factura','cliente','articulo','empleado','detalle'));
    }

}
