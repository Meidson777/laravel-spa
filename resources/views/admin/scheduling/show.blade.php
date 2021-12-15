@extends('layouts.Header')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agendamentos</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between"">
                    <h6 class=" m-0 font-weight-bold text-primary">Agendamentos total: ???</h6>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.new-schedulings') }}">Novo Agendamento</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CLIENTE</th>
                                <th>PROCEDIMENTO</th>
                                <th>DATA AGENDAMENTO</th>
                                <th>OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scheduling as $row)
                            <tr>
                                <th scope='row'>@php echo $row->idAgendamento; @endphp </th>
                                <td>@php echo $row->nomeCliente; @endphp</td>
                                <td>@php echo $row->nomeProcedimento; @endphp</td>
                                <td>@php echo $row->dataAgendamento; @endphp</td>
                                <td>
                                    <a href="?op=SendMsgAgendamento&id=@php echo $row->idAgendamento; @endphp"
                                        class="btn btn-sm btn-primary">Enviar Mensagem </a>
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
