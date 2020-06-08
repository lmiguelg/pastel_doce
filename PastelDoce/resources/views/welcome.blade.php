
@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">


    <div  iv class="row justify-content-center rounded-lg p-2">
        <h1>Pastel Doce</h1>


    </div>
        <div class="row justify-content-center rounded-lg p-2">
        <div class="col-mg-4">
            <a href="{{ route('encomendas.index')}}">Encomendas</a>
        </div>

        </div>
</div>
@endsection

