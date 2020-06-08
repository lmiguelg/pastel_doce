@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('message') != null)
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    <div class="row justify-content-center bg-secondary rounded-lg p-2">
        <div class="col-md-12">
            <form action="/encomendas" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="in_name" class="text-white">Nome Cliente</label>
                        <input type="text" class="form-control" id="in_name" name="name" aria-describedby="nome cliente" placeholder="Introduzir nome do cliente" required>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="in_telefone" class="text-white">Telefone</label>
                        <input type="number" class="form-control" id="in_telefone" name="telefone" aria-describedby="numero de telefone" placeholder="Introduzir telefone" required>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="in_contribuinte" class="text-white">Contribuinte</label>
                        <input type="number" class="form-control" id="in_contribuinte" name="contribuinte" aria-describedby="contribuinte" placeholder="Introduzir contribuinte">

                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Produto</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01">
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{$produto->descicao}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Local</label>
                            </div>
                            <select class="custom-select" name="local_entrega" id="inputGroupSelect02">
                                <option value="Funchal">Funchal</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Machico">Machico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label for="in_data" class="input-group-text">Date</label>
                            </div>

                            <input type="date" class="form-control" id="in_data" name="data" aria-describedby="data">
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>

    </div>

    <div class="row justify-content-center  mt-4">
        <div class="col-md-8">
            <h1>Lista de encomendas</h1>
        <div class="list-group">

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data</th>
                    <th scope="col">local</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($encomendas as $encomenda)
                    <tr>
                        <td>{{$encomenda->cliente_id}}</td>
                        <td>{{$encomenda->data}}</td>
                        <td>{{$encomenda->local_entrega}}</td>
                        <td scope="col">
                            <form action="{{ route('encomendas.destroy', $encomenda->id) }}"method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>


        </div>
    </div>
</div>
@endsection
