@extends('layouts.Header')

@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Faturamento de Procedimentos Pagos</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary ">Faturamento total do Mês: R$:</h6>
                <a href="{{ route('admin.evenues-month') }}" class="btn btn-sm btn-success">Faturamento por mês</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CLIENTE</th>
                            <th>VALOR PAGO</th>
                            <th>STATUS</th>
                            <th>DATA PAGEMENTO</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($revenues as $item)
                            <tr>
                                <th scope='row' class="text-center">@php echo $item->idPagamentoProcedimento @endphp</th>
                                <td>@php echo $item->nomeCliente @endphp</td>
                                <td id="valor" class="text-center">R$: @php echo $item->valorProcedimento @endphp</td>
                                <td class="text-center text-italic"> @php echo $item->statusServico @endphp</td>
                                <td class="text-center">@php echo $item->created_at @endphp</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="?op=DetailsFinalizaProcedimento&id=">
                                        <i class='bx bx-chevron-right'></i> Detalhes
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $revenues->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
