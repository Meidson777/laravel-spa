@extends('layouts.Header')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-2 text-gray-800">Tabela Serviços</h1> -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary">Serviços</h4>
                        <a class="btn btn-sm btn-success" href="{{ route('admin.create-service') }}">Novo Procedimento</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CLIENTE</th>
                                <th>PROCEDIMENTO</th>
                                <th>VALOR</th>
                                <th>STATUS</th>
                                <!-- <th>CODE</th> -->
                                <th>OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                                <tr>
                                    <th scope='row' class="text-center">@php echo $item->idServico; @endphp</th>
                                    <td>@php echo $item->nomeCliente; @endphp</td>
                                    <td class="text-center">@php echo $item->nomeProcedimento; @endphp</td>
                                    <td class="text-center">R$: @php echo $item->valorProcedimento; @endphp</td>
                                    <td class="text-center" id="statusProcedimento">@php echo $item->statusServico; @endphp</td>
                                    <td class="text-center" id="statusProcedimento">
                                        @if ($item->statusServico == 'Finalizado')
                                            <a class="btn btn-danger btn-sm disabled"
                                                href="{{ route('admin.finish-service', $item->idServico) }}">Finalizado <i
                                                    class="far fa-times-circle"></i></a>
                                        @else
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.finish-service', $item->idServico) }}">Finalizar
                                                <div class="spinner-border spinner-border-sm" role="status">
                                                    <span class="visually-hidden"></span>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $services->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
