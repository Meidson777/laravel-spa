@extends('layouts.Header')

@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Faturamento do ano de: {{$ano}} </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary ">Faturamento total: R$: {{ $faturamentoAnual}}</h6>
                <form action="" method="get">
                    <div class="d-flex justify-content-between m-1">
                        <input type="submit" value="Pesquisar" class="btn btn-sm btn-success col m-1">
                        <select name="ano" id="" class="form-control form-control-sm form-select col m-1">
                            @php
                            $ano = 2021;
                            while ($ano <= 2030) :
                                echo '<option value=' . $ano . '>' . $ano . '</option>';
                                $ano++;
                            endwhile;
                            @endphp
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">MÊS</th>
                            <th class="text-center">FATURAMENTO MÊS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            foreach ($mes as $index => $v) : ?>
                            <tr>
                                <?php
                                echo '<td class="text-uppercase">' . $v . '</td>';
                                if($total_formatMes[$index] ==0):
                                    echo '<td class="text-center text-danger">R$: ' . $total_formatMes[$index] . '</td>'; 
                                else :
                                    echo '<td class="text-center text-success">R$: ' . $total_formatMes[$index] . '</td>';                                           
                                endif;

                                ?>
                            </tr>
                        <?php 
                            endforeach; 
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
