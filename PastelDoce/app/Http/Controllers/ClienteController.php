<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    //
    public function index(){
        $clientes = Cliente::all();

        return view('clientes.index', ['clientes'=>$clientes]);
    }

    public function show($id){

        //use id to select the cliente
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', ['cliente' => $cliente]);
    }

    public function store(){

        $cliente = new Cliente();

        $cliente->name = request('name');
        $cliente->morada = request('morada');
        $cliente->telefone = request('telefone');
        $cliente->contribuinte = request('contribuinte');

        //error_log($company);

        $cliente->save();

        return redirect('/companies')->with('message','Added company to db');
    }

    public function destroy($id){

       $company = Company::findOrFail($id);
       $company->delete();

        return redirect('/companies');
    }
}
