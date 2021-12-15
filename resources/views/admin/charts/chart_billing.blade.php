@extends('layouts.Header')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                label: 'Procedimentos Realizados',
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


@endsection

   

