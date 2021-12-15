@extends('layouts.Header')

@section('content')

<!-- Verifica se o usuario tem permissão para acessar  -->

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">

        <!-- Nested Row within Card Body -->

        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Atualizar Produto</h1>
            </div>
           
            <form class="user" method="post" action="{{ route('admin.create-product') }}">
                @csrf
                <!-- Code Cliente não visivel -->
                 <input type="hidden" class="form-control form-control-user" name="idProduto" value="{{ $product->idProduto ?? old('idProduto')}}">
                <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="">Nome Produto</label>
                        <input type="text" class="form-control form-control-sm" name="nomeProduto" value="{{ $product->nomeProduto }}">
                    </div>

                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="">Descrição Produto</label>
                        <input type="text" class="form-control form-control-sm" name="descricaoProduto" value="{{ $product->descricaoProduto }}">
                    </div>
                   

                </div>

                <hr>
                <div class="form-group row">
                    <button type="submit" name="btnUpProduto" class="btn btn-primary btn-sm mr-2 mb-2">ATUALIZAR</button>
                    <a class="btn btn-danger btn-sm" href="?op=MainProduto">CANCELAR</a>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection