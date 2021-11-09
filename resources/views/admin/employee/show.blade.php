@extends('layouts.Header')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h5 class="font-weight-bold text-primary">Funcionarios</h4>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.create-employee') }}">Novo Funcionario</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $value)
                            <tr>
                                <td>@php echo $value->nomeFuncionario @endphp</td>
                                <td>@php echo $value->telefoneFuncionario @endphp</td>
                                <td>@php echo $value->emailFuncionario @endphp</td>
                                <td>
                                    <a class="btn btn-success btn-sm m-1" href="{{ route('employee-billing') }}">
                                        <i class="bx bx-dollar "></i> Faturamento
                                    </a>
                                    <a class="btn btn-primary btn-sm m-1" href="">
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

   

