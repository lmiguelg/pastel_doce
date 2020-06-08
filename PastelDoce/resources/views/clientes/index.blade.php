@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center bg-secondary rounded-lg p-2">
        <div class="col-md-12">
            <form action="/clientes" method="POST">
                @csrf
                    <div class="form-group">
                    <label for="in_name" class="text-white">Company Name</label>
                        <input type="text" class="form-control" id="in_name" name="name" aria-describedby="nome cliente" placeholder="Introduzir nome do cliente" required>

                    </div>
                    <div class="form-group">
                        <label for="in_morada" class="text-white">Morada</label>
                        <input type="text" class="form-control" id="in_morada" name="morada" aria-describedby="morada" placeholder="Introduzir a morada" required>

                    </div>
                    <div class="form-group">
                        <label for="in_telefone" class="text-white">Telefone</label>
                        <input type="number" class="form-control" id="in_telefone" name="telefone" aria-describedby="numero de telefone" placeholder="Introduzir número de telefone" required>

                    </div>
                    <div class="form-group">
                        <label for="in_contribuinte" class="text-white">Contribuinte</label>
                        <input type="number" class="form-control" id="in_contribuinte" name="contribuinte" aria-describedby="contribuinte" placeholder="Introduzir número de contribuinte">

                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>

    </div>

    <div class="row justify-content-center  mt-4">
        <div class="col-md-8">
            <h1>Lista de Clientes</h1>
        <div class="list-group">
            @foreach($clientes as $cliente)
                <a href="#" class="list-group-item list-group-item-action">{{ $cliente->name }}</a>
            @endforeach
        </div>
    </div>
</div>
@endsection
