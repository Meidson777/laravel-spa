@extends('layouts.Header')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h5 class="font-weight-bold text-primary">CODE</h4>
                        <a class="btn btn-sm btn-success" href="{{ route('admin.create.qrcode') }}">Novo QrCode</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align:center">ID</th>
                                <th style="text-align:center">CODE</th>
                                <th style="text-align:center">ASSOCIADO</th>
                                <th style="text-align:center">OPÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($qrcodes as $value)
                                <tr>
                                    <td style="text-align:center">@php echo $value->idQrCode @endphp</td>
                                    <td style="text-align:center">@php echo $value->code @endphp</td>
                                    <td style="text-align:center">
                                        @php
                                            if ($value->Code_idCliente != 0):
                                                echo '<i class="bx bx-check" style="font-size: 20px; color:green; font-weight: bold;"></i>';
                                            else:
                                                echo '<i class="bx bx-x" style="font-size: 20px; color:red; font-weight: bold;"></i>';
                                            endif;
                                        @endphp

                                    </td>
                                    <td style="text-align:center">
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.details.qrcode', $value->idQrCode)}}">
                                            <i class="bx bx-barcode"></i> Detalhes
                                        </a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $qrcodes->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
