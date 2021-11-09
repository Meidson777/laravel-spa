@extends('layouts.Header')

@section('content')

{{-- <-- Begin Page Content --> --}}
<div class="container-fluid">

    <!-- Page Heading -->

    {{ $msg ?? ''}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary">Procedimentos</h4>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.create-procedure')}}">Novo Procedimento</a>
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
                            <th>VALOR</th>
                            <th>OPÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($procedures as $value)
                            <tr>
                                <th scope='row'>@php echo $value->idProcedimento @endphp </th>
                                <td>@php echo $value->nomeProcedimento @endphp </td>
                                <td>@php echo $value->descricaoProcedimento @endphp </td>
                                <td>@php echo $value->valorProcedimento @endphp </td>
                                <td>
                                
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.procedure-edit', $value->idProcedimento) }}">
                                    <i class="bx bx-edit "></i> Editar
                                    </a>
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

   

