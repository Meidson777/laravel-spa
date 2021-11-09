@extends('layouts.Header')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h5 class="font-weight-bold text-primary">Clientes</h4>
                    <a class="btn btn-sm btn-success" href="{{ route('admin.create-client') }}">Novo Cliente</a>
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
                        @foreach ($users as $value)
                            <tr>
                                <td>@php echo $value->nomeCliente @endphp</td>
                                <td>@php echo $value->telefoneCliente @endphp</td>
                                <td>@php echo $value->emailCliente @endphp</td>
                                <td>
                                    <a class="btn btn-primary btn-sm m-1" href="{{ route('details-client',$value->idCliente) }}">
                                        <i class="bx bx-server"></i> Detalhes
                                    </a>
                                    <a class="btn btn-primary btn-sm m-1" href="">
                                        <i class="bx bx-edit"></i> Editar
                                    </a>   
                                    <a class="btn btn-danger btn-sm m-1" href="{{ route('delete-client', $value->idCliente) }}">
                                        <i class="bx bx-trash"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

   

