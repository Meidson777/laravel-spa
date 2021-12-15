@php $user_type = $_SESSION['user_type']; @endphp
@extends('layouts.Header')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h3 class="h4 mb-2 text-gray-800">Faturamento  </h3>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary" id="faturamentoFuncionario"></h6>
                {{-- <?php if($user_type !=0):?> <a href="?op=FaturamentoFuncionarioMes&id=<?php  echo $id ?>">Faturamento por mês</a> <?php endif; ?> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CLIENTE</th>
                            <th>VALOR PAGO</th>
                            <th>STATUS</th>
                            <th>PROCEDIMENTO</th>
                            <th>DATA PROCEDIMENTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenue_employee as $item)
                            <tr>
                                <th scope='row'>@php echo $item->idPagamentoProcedimento @endphp</th>
                                <td>@php echo $item->nomeCliente @endphp</td>
                                <td class="valor">@php echo $item->valorProcedimento @endphp</td>
                                <td>@php echo $item->statusServico @endphp</td>
                                <td>@php echo $item->nomeProcedimento @endphp</td>
                                <td>@php echo $item->created_at @endphp</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $revenue_employee->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <a href="{{ route('admin.employees') }}" class="btn btn-sm btn-primary"><i class="fas fa-home"></i> Voltar</a>
        </div>
    </div>

</div>


@endsection

   

