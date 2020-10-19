<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clienteBD;

class MessageClient extends Controller
{
    public function store()
    {
        $cliente =new clienteBD();


        $cliente->idlcliente = request('IdLCliente');
        $cliente->nombre = request('Nombre');
        $cliente->apellido = request('Apellido');
        $cliente->cedula = request('Cedula');
        $cliente->telefono = request('Telefono');
        $cliente->departamento = request('Departamento');
        $cliente->direccion = request('Direccion');
        $cliente->email = request('Email');

        $cliente  -> save();

        //return redirect('/cliente')->with('message', 'Insercion exitosa');
        return back()->with('success','Item created successfully!');
    }
}
