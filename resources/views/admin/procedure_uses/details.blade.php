@extends('layouts.Header')

@section('content')

 <!-- Begin Page Content -->
 <div class="container">
  

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Procedimentos Utiliza</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary "></h6>
                <a href="{{ route('admin.procedure-uses') }}" class="btn btn-sm btn-warning">Voltar</a>
            </div>  
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PRODUTO</th>
                            <th>QUANTIDADE UTILIZADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procedure_use as $item)
                            <tr>
                                <th scope='row' class="text-center">{{$item->Produto_idProduto}}</th>
                                <td class="text-center">{{$item->nomeProduto}}</td>
                                <td class="text-center">{{$item->qtdUtilizado}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

   

