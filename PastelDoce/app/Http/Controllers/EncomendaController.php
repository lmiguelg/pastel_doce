<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encomenda;
use App\Produto;
use App\Cliente;

class EncomendaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $encomendas = Encomenda::all();
        $produtos = Produto::all();
        $clientes = Cliente::all();

        return view('encomendas.index', ['encomendas'=>$encomendas,'produtos'=>$produtos,'clientes'=>$clientes]);
    }

    public function show($id){

        //use id to select the encomendas
        $encomenda = Encomenda::findOrFail($id);
        return view('encomendas.show', ['encomenda' => $encomenda]);
    }

    public function store(){

        $encomenda = new Encomenda();
        $contribuinte = request('contrbuinte');

        //$cliente = Cliente::where('contribuinte', $contribuinte)->get();


        $encomenda->data = request('data');
        $encomenda->local_entrega = request('local_entrega');
        $encomenda->cliente_id = 1;


        $encomenda->save();

        return redirect('/encomendas')->with('message','Adicionado com sucesso');
    }

    public function destroy($id){

       $encomenda = Encomenda::findOrFail($id);
       $encomenda->delete();

        return redirect('/encomendas')->with('message','Eliminado com sucesso');
    }
}
