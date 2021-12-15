@extends('layouts.Header')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detalhe Code</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CODE</th>
                            <th>CLIENTE</th>
                            <th>OPÇÕES</th>
                            <!-- <th>AÇÕES</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($qrcode as $value)
                            <tr>
                                <th scope='row'>@php echo $value->idQrCode; @endphp</th>
                                <td>@php echo $value->code; @endphp</td>
                                <td>@php echo $value->nomeCliente; @endphp</td>
                                
                                <td>
                                    <input type="hidden" id="valor" value="@php echo $value->idQrCode; @endphp">
                                    <button class="btn btn-primary btn-sm" onClick="createQrCode()"><i class="fas fa-qrcode"></i> Gerar QR Code</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

   

