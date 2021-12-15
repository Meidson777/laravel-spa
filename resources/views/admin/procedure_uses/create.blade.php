@extends('layouts.Header')

@section('content')

    <!-- Verifica se o usuario tem permissão para acessar  -->

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">

            <!-- Nested Row within Card Body -->

            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Cadastrar Procedimento</h1>
                </div>
                
                @if (isset($erro))
                        {{$erro}}
                @endif
    
                <form class="user" method="POST" action="{{ route('admin.create.procedure_uses') }}">
                    @csrf
                    <div class="form-group col">
                        <label for="">QUANTIDADE UTILIZADO</label>
                        <div class="col-sm-5 mb-3">
                            <input type="number" class="form-control form-control-sm" id="" name="qtdUtilizado"
                                placeholder="QUANTIDADE DE PRODUTO UTILIZADO">
                        </div>

                        <label for="">PROCEDIMENTO</label>
                        <div class="col-sm-3">
                            <select name="Procedimento_idProcedimento" class="form-select form-control">
                                @foreach ($procedure as $item)
                                    <option value="{{ $item->idProcedimento }}">{{ $item->nomeProcedimento }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="">PRODUTO</label>
                        <div class="col-sm-3 mb-2 mb-2">
                            <select name="Produto_idProduto" class="form-select form-control">
                                @foreach ($product as $item)
                                    <option value="{{ $item->idProduto }}">{{ $item->nomeProduto }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <button type="submit" name="btnCadProcedimentoUtiliza"
                            class="btn btn-primary btn-sm mb-2 ">CADASTRAR</button>
                        <a href="?op=home" class="btn btn-danger btn-sm ">CANCELAR</a>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
