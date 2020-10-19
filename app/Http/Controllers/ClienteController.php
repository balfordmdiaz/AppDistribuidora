<?php

namespace App\Http\Controllers;

use App\Models\clienteBD;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {

        $cliente=clienteBD::get();
        return view('cliente',compact('cliente'));
    }

     public function show($id)
    {

        return view('project.show',[
            'clientebd'=> clienteBD::findOrFail($id)
        ]);

    }
}
