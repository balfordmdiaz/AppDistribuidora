<?php

namespace App\Http\Controllers;

use App\Models\clienteBD;
use App\Models\articuloBD;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $cliente=clienteBD::get();
        $articulo=articuloBD::get();
        return view('factura',compact('cliente','articulo'));
    }
}
