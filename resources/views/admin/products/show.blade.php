@extends('layouts.Header')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Produto total: ???</h6>
                <a class="btn btn-sm btn-success" href="{{ route('admin.create-product') }}">Novo Produto</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>DESCRIÇAO</th>
                            <th>VALOR COMPRA</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($products as $value)
                                <tr>
                                    <th scope='row'> @php echo $value->idProduto @endphp</th>
                                    <td> @php echo $value->nomeProduto @endphp</td>
                                    <td> @php echo $value->descricaoProduto @endphp</td>
                                    <td>R$: @php echo $value->valorCompra @endphp</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.update.product', $value->idProduto) }}">
                                        <i class="bx bx-edit "></i> Editar
                                        </a>
                                        <!-- <a class="btn btn-danger btn-sm" href="?op=ExcluirProduto&id=">
                                            <i class="fas fa-trash"></i> Excluir
                                        </a> -->
                                    </td>
                                </tr>    
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

   

