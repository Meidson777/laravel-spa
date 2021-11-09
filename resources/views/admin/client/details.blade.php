@extends('layouts.Header')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detalhe Cliente</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>CPF</th>
                            <th>ENDEREÇO</th>
                            <th>TELEFONE</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $value)
                        <tr>
                                <td>@php echo $value->idCliente @endphp</td>
                                <td>@php echo $value->nomeCliente @endphp</td>
                                <td>@php echo $value->cpfCliente @endphp</td>
                                <td>@php echo $value->rua @endphp</td>
                                <td>@php echo $value->telefoneCliente @endphp</td>
                                <td>
                                    <input type="hidden" id="valor" value="@php echo $value->qrcode @endphp">
                                    <button class="btn btn-primary btn-sm" onClick="createQrCode()"><i class="fas fa-qrcode"></i> Gerar QR Code</button>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <a class="btn btn-primary btn-sm m-1" href="{{ route('admin.clients')}}">
                    <i class='bx bx-left-arrow-alt'></i> Voltar
                </a>
                <div id="qrcontainer">
                    <div id="qrcode"></div>
                </div><br>
                <div id="btndowndiv">
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

   

