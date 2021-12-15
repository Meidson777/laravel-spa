@extends('layouts.Header')

@section('content')

 <!-- Begin Page Content -->
 <div class="container">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between ">
                <h6 class="m-0 font-weight-bold text-primary ">Procedimento utiliza</h6>
                <a href="{{ route('admin.create.procedure_uses') }}" class="btn btn-sm btn-success">Cadastrar</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PROCEDIMENTO</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procedure_uses as $item)                
                            <tr>
                                <th scope='row' class="text-center">{{ $item->idProcedimento}}</th>
                                <td class="text-center">{{ $item->nomeProcedimento}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.procedure_uses.details', $item->idProcedimento) }}">
                                        <i class='bx bx-chevron-right'></i> Detalhes
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

   

