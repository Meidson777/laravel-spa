@extends('layouts.Header')

@section('content')

    <!-- Verifica se o usuario tem permissão para acessar  -->

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">

            <!-- Nested Row within Card Body -->

            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Adicionar ao Estoque</h1>
                </div>

               
                <form class="user" method="POST" action="{{ route('admin.create.inventory') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="">PRODUTO</label>
                        <div class="row-sm-5 ml-2 mr-3 mb-2">
                            <select name="Produto_idProduto" class="form-select form-control-sm">
                                @foreach ($products as $item)
                                    <option value="@php echo $item->idProduto @endphp">@php echo $item->nomeProduto @endphp</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row-sm-5 mr-3 mb-2">
                            <input type="text" class="form-control form-control-sm" id="" name="qtd"
                                placeholder="ENTRADA NO ESTOQUE" required>
                        </div>
                        <div class="row-sm-5 mb-2">
                            <input type="text" class="form-control form-control-sm" placeholder="QUANTIDADE MINIMA"
                                name="qtdmin">
                        </div>

                    </div>
                    <hr>
                    <div class="form-group row">
                        <button type="submit" name="btnCadEstoque"
                            class="btn btn-primary btn-sm mr-2 mb-2 ">CADASTRAR</button>
                        <button type="reset" class="btn btn-danger btn-sm ">CANCELAR</button>
                    </div>
                </form>

            </div>

        </div>
    </div>


@endsection
