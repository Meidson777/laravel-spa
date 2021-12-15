{{-- @extends('layouts.Header')

@section('content') --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Grafico de Movimento mensal</h6>
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

{{-- @endsection

   
 --}}
