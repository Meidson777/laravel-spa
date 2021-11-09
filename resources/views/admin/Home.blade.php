@extends('layouts.Header')

@section('content')

    <!-- Page Heading  Title-->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DASHBOARD SPA</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- valida se o usuario tem permissão para vizualizar essas informações -->
        
        <!-- Faturamento Mes -->
        <div class="col-sm-3 col-md-4 mb-4">
            <div class="card text-white bg-primary mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Farturamento Mês</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{$faturamentoMes}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-dollar icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Faturamento Anual -->
        <div class="col-sm-3 col-md-4 mb-4">
            <div class="card text-white bg-secondary mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Farturamento Anual</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               {{ $faturamentoAnual }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bx bx-dollar icon__main"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- valida se o usuario tem permissão para vizualizar essas informações -->

        <!-- serviço em Finalizados -->
        <div class="col-sm-3 col-md-4 mb-4">
            <a style="text-decoration:none" href="?op=ListarServico&status=Finalizado">
                <div class="card text-white bg-danger mb-3 shadow h-200">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Serviços Finalizados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                   {{ $serviceFinalized}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-x icon__main"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- serviço em Andamento -->
        <div class="col-sm-3 col-md-4 mb-4">
            <a style="text-decoration:none" href="?op=ListarServico&status=Em Andamento">
                <div class="card text-white bg-success mb-3 shadow h-200">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Serviços em Andamento</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $serviceProgress}}
                                </div>
                            </div>
                            @if ($serviceProgress != 0)
                                <div class="spinner-border text-light m-lg-2" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- valida se o usuario tem permissão para vizualizar essas informações -->
       
        <!-- Agendamentos -->
        <div class="col-sm-3 col-md-4 mb-4">
            <a style="text-decoration:none" href="?op=MainAgendamento">
                <div class="card text-white bg-warning mb-3 shadow h-200">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Agendamentos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  0
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bx bx-calendar icon__main"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
       
        <!-- valida se o usuario tem permissão para vizualizar essas informações -->

    </div>
    </div>


@endsection
