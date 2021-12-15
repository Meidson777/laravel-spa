<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //
    public function login(){
        return view ('welcome');
    }

    public function index(){

        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];

        // echo $user_id . '\\'. $user_type;

        if ($user_type != 0) {
            $date = Carbon::now();
            // Verifica os serviços em Andamento e Finalizados
            $serviceFinalized = DB::table('servicoprocedimentos')->where('statusServico','Finalizado')->count();
            $serviceProgress = DB::table('servicoprocedimentos')->where('statusServico','Em Andamento')->count();
            $faturamentoAnual = DB::table('pagamentoprocedimentos')->sum('valorProcedimento');
            $faturamentoMes = DB::table('pagamentoprocedimentos')->whereMonth('created_at', $date)->sum('valorProcedimento');
                
        }else
        {
            $date = Carbon::now();
            // Verifica os serviços em Andamento e Finalizados
            $serviceFinalized = DB::table('servicoprocedimentos')
                                    ->where('Funcionario_idFuncionario', '=', $user_id)
                                    ->where('statusServico','Finalizado')->count();
            $serviceProgress = DB::table('servicoprocedimentos')
                                    ->where('Funcionario_idFuncionario', '=', $user_id)
                                    ->where('statusServico','Em Andamento')->count();

            $faturamentoAnual = DB::table('pagamentoprocedimentos')
                                    ->join('servicoprocedimentos', 'pagamentoprocedimentos.Servico_idServico', '=', 'servicoprocedimentos.idServico' )
                                    ->where('servicoprocedimentos.Funcionario_idFuncionario', $user_id)->sum('valorProcedimento');
            
            $faturamentoMes = DB::table('pagamentoprocedimentos')
                                    ->join('servicoprocedimentos', 'pagamentoprocedimentos.Servico_idServico', '=', 'servicoprocedimentos.idServico' )
                                    ->whereMonth('pagamentoprocedimentos.created_at', $date)
                                    ->where('servicoprocedimentos.Funcionario_idFuncionario', $user_id)
                                    ->sum('valorProcedimento');
        }


        // Grafico movimentação
        $mes_num = 1;

        while ($mes_num <= 12) {
            if ($mes_num < 13) {

                $count = DB::table('servicoprocedimentos')
                ->whereMonth('created_at', '=', $mes_num)
                ->where('statusServico','Finalizado')->count();
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
                
                $mesMove[] = $mes_nome;
                $qtdMove[] = $count;
                
            }
            $mes_num++;
        }
        // Grafico movimento

        // Grafico financeiro
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
        // Grafico financeiro


        return view('admin.Home', compact('serviceFinalized', 'serviceProgress', 'faturamentoAnual', 'faturamentoMes', 'mesMove', 'qtdMove', 'mes', 'total_formatMesCharts'));
    }



}
