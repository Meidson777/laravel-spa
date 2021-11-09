@extends('layouts.Header')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Verifica se o usuario tem permissão para acessar  -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Estoque total: ???</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PRODUTO</th>
                            <th>QUANTIDADE EM ESTOQUE</th>
                            <th>QUANTIDADE MINIMA</th>
                            <!-- <th>OPÇÕES</th> -->
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($inventorys as $item)
                            <tr>
                                <th scope='row'>@php echo $item->idEstoque @endphp</th>
                                <td>@php echo $item->nomeProduto @endphp</td>
                                <td>
                                    @if ($item->qtd <= $item->qtdmin)
                                        {{$item->qtd. ' UND'}} <div class="spinner-grow spinner-grow-sm text-warning" role="status"></div>                                             
                                    @else
                                        {{$item->qtd. ' UND'}}
                                    @endif
                                </td>
                                <td> @php echo $item->qtdmin @endphp</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <a href="?op=AdicionarEstoque" class="btn btn-sm btn-success">Adicionar ao estoque</a>
        </div>
    </div>

</div>


@endsection

   

