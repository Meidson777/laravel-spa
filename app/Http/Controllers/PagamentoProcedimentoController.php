<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PagamentoProcedimentoController extends Controller
{
    //

    public function index()
    {
        // Verifica os serviços em Andamento e Finalizados
        $revenues = DB::table('pagamentoprocedimentos')
            ->join('servicoprocedimentos', 'pagamentoprocedimentos.Servico_idServico', '=', 'servicoprocedimentos.idServico')
            ->join('procedimentos', 'pagamentoprocedimentos.Servico_IdProcedimento', '=', 'procedimentos.idProcedimento')
            ->join('clientes', 'pagamentoprocedimentos.Servico_IdCliente', '=', 'clientes.idCliente')
            ->paginate(15);
        // dd($revenues);
        return view('admin.revenues.show', compact('revenues'));
    }

    public function showMes(Request $request)
    {

        $ano = $request->input('ano');
        $mes_num = 1;
        $faturamentoAnual = DB::table('pagamentoprocedimentos')->whereYear('created_at', '=', $request->input('ano'))
            ->sum('valorProcedimento');

        while ($mes_num <= 12) {
            if ($mes_num < 13) {
                $faturamentoMes = DB::table('pagamentoprocedimentos')->whereMonth('created_at', '=', $mes_num)->whereYear('created_at', '=', $request->input('ano'))
                    ->sum('valorProcedimento');

                switch ($mes_num):
                    case '1':
                        $mes_nome = "Janeiro";
                        break;
                    case '2':
                        $mes_nome = "Fevereiro";
                        break;
                    case '3':
                        $mes_nome = "Março";
                        break;
                    case '4':
                        $mes_nome = "Abril";
                        break;
                    case '5':
                        $mes_nome = "Maio";
                        break;
                    case '6':
                        $mes_nome = "Junho";
                        break;
                    case '7':
                        $mes_nome = "Julho";
                        break;
                    case '8':
                        $mes_nome = "Agosto";
                        break;
                    case '9':
                        $mes_nome = "Setembro";
                        break;
                    case '10':
                        $mes_nome = "Outubro";
                        break;
                    case '11':
                        $mes_nome = "Novembro";
                        break;
                    case '12':
                        $mes_nome = "Dezembro";
                        break;
                endswitch;

                $mes[] = $mes_nome;

                $totalMes = $faturamentoMes;
                // formatando numero para mostrar somente até duas casas decimais
                $total_formatMes[] = $totalMes;
            }
            $mes_num++;
        }

        // echo $faturamentoAnual .'-'. $faturamentoMes ;
        return view('admin.revenues.faturamentoMes', compact('mes', 'total_formatMes', 'faturamentoAnual', 'ano'));
    }

    public function charts()
    {
        $mes_num = 1;

        while ($mes_num <= 12) {
            if ($mes_num < 13) {

                $count = DB::table('pagamentoprocedimentos')->whereMonth('created_at', '=', $mes_num)->sum('valorProcedimento');
                switch ($mes_num):
                    case '1':
                        $mes_nome = "Janeiro";
                        break;
                    case '2':
                        $mes_nome = "Fevereiro";
                        break;
                    case '3':
                        $mes_nome = "Março";
                        break;
                    case '4':
                        $mes_nome = "Abril";
                        break;
                    case '5':
                        $mes_nome = "Maio";
                        break;
                    case '6':
                        $mes_nome = "Junho";
                        break;
                    case '7':
                        $mes_nome = "Julho";
                        break;
                    case '8':
                        $mes_nome = "Agosto";
                        break;
                    case '9':
                        $mes_nome = "Setembro";
                        break;
                    case '10':
                        $mes_nome = "Outubro";
                        break;
                    case '11':
                        $mes_nome = "Novembro";
                        break;
                    case '12':
                        $mes_nome = "Dezembro";
                        break;
                endswitch;
                $mes[] = $mes_nome;

                $totalMes = $count;
                // formatando numero para mostrar somente até duas casas decimais
                $total_formatMesCharts[] = number_format($totalMes, 2, '.', '');
                // $faturamento[] = $count;
            }
            $mes_num++;
        }

        return view('admin.charts.chart_billing', compact('mes', 'total_formatMesCharts'));
    }
}
