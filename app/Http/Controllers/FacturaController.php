<?php

namespace App\Http\Controllers;

use App\Models\clienteBD;
use App\Models\articuloBD;
use App\Models\facturaBD;

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
        return view('project.insertarfact',compact('factura','cliente','articulo'));
    }

}
