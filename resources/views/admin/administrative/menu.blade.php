@extends('layouts.Header')

@section('content')

    

<div class="row">

   

    <!-- funcionario -->
    <div class="col-sm-2 col-md-4 mb-4">
        <a style="text-decoration:none" href="{{ route('admin.employees') }}">
            <div class="card text-white bg-dark mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                funcionario
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-data icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- procedimento -->
    <div class="col-sm-2 col-md-4 mb-4">
        <a style="text-decoration:none" href="{{ route('admin.procedure') }}">
            <div class="card text-white bg-dark mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                procedimento
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-cog icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

     <!-- procedimento -->
     <div class="col-sm-2 col-md-4 mb-4">
        <a style="text-decoration:none" href="{{ route('admin.procedure-uses') }}">
            <div class="card text-white bg-dark mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                procedimento utiliza
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-plus icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>


    <!-- faturamento -->
    <div class="col-sm-2 col-md-4 mb-4">
        <a style="text-decoration:none" href="{{ route('admin.evenues')}}">
            <div class="card text-white bg-dark mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                faturamento
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-dollar icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- produto -->
    <div class="col-sm-2 col-md-4 mb-4">
        <a style="text-decoration:none" href="{{ route('admin.products') }}">
            <div class="card text-white bg-dark mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                produto
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-box icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- estoque -->
    <div class="col-sm-2 col-md-4 mb-4">
        <a style="text-decoration:none" href="{{ route('admin.inventory') }}">
            <div class="card text-white bg-dark mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                estoque
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-book-open icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- funcionario -->
    <div class="col-sm-2 col-md-4 mb-4">
        <a style="text-decoration:none" href="{{ route('admin.qrcodes') }}">
            <div class="card text-white bg-dark mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                qrcode
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-barcode icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>


</div>


@endsection
