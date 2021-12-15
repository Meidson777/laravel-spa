@php
$type_user = $_SESSION['user_type'];
@endphp
@extends('layouts.Header')

@section('content')


    <!-- Page Heading  Title-->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DASHBOARD SPA</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- valida se o usuario tem permissão para vizualizar essas informações -->
        @if (isset($erro))
            <div class="alert alert-danger" role="alert">

                {{ $erro }}

            </div>
        @endif

        <!-- Faturamento Mes -->
        <div class="col-sm-3 col-md-4 mb-4">
            <div class="card text-white bg-primary mb-3 shadow h-200">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Farturamento Mês</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $faturamentoMes }}
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
            <a style="text-decoration:none" href="{{ route('admin.services-status', 'Finalizado') }}">
                <div class="card text-white bg-danger mb-3 shadow h-200">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Serviços Finalizados</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $serviceFinalized }}
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
            <a style="text-decoration:none" href="{{ route('admin.services-status', 'Em Andamento') }}">
                <div class="card text-white bg-success mb-3 shadow h-200">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Serviços em Andamento</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $serviceProgress }}
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
        @if ($type_user != 0)
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
        @endif


        <!-- valida se o usuario tem permissão para vizualizar essas informações -->

        @if ($type_user != 0)
            {{-- Graficos --}}
            <div class="row ">
                {{-- Grafico movimento --}}
                <div class="col-xl-6 col-lg-6">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafico de Movimento</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="myChartMove"></canvas>
                        </div>
                    </div>

                    <script>
                        var labels = [
                            @php
                            foreach ($mesMove as $v) {
                                echo "'" . $v . "',";
                            }
                            @endphp
                        ];
                        var data = [
                            @php
                            foreach ($qtdMove as $v) {
                                echo "'" . $v . "',";
                            }
                            @endphp
                        ];

                        console.log(labels);
                        console.log(data);
                        var ctx = document.getElementById('myChartMove').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Procedimentos Realizados',
                                    backgroundColor: "#DC143C",
                                    borderColor: "#DC143C",
                                    pointRadius: 3,
                                    pointBackgroundColor: "#DC143C",
                                    pointBorderColor: "#DC143C",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "#DC143C",
                                    pointHoverBorderColor: "DC143C",
                                    pointHitRadius: 50,
                                    pointBorderWidth: 1,
                                    data: data,

                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                </div>
                {{-- Grafico financeiro --}}
                <div class="col-xl-6 col-lg-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Grafico Faturamento</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <script>
                        var labels = [
                            @php foreach ($mes as $v) {
                                echo "'" . $v . "',";
                            } @endphp
                        ];
                        var data = [
                            @php foreach ($total_formatMesCharts as $v) {
                                echo "'" . $v . "',";
                            } @endphp
                        ];

                        console.log(labels);
                        console.log(data);
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Faturamento Mensal',
                                    backgroundColor: "#0d6efd",
                                    borderColor: "#0d6efd",
                                    pointRadius: 3,
                                    pointBackgroundColor: "#0d6efd",
                                    pointBorderColor: "#0d6efd",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "#0d6efd",
                                    pointHoverBorderColor: "#0d6efd",
                                    pointHitRadius: 50,
                                    pointBorderWidth: 1,
                                    data: data,

                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                </div>
            </div>
            {{-- Graficos --}}
        @endif

    </div>

@endsection
