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
        return view('factura');
    }


    public function insertar()
    {
        $cliente=clienteBD::get();
        $articulo=articuloBD::get();
        $factura=facturaBD::get();
        $empleado=empleadoBD::get();
        $detalle=factdetalleDB::get();
        return view('project.insertarfact',compact('factura','cliente','articulo','empleado','detalle'));
    }

}
