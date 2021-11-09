<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    //
    public function login(){
        return view ('welcome');
    }

    public function index(){

        // Verifica os serviços em Andamento e Finalizados
        $serviceFinalized = DB::table('servicoprocedimentos')->where('statusServico','Finalizado')->count();
        $serviceProgress = DB::table('servicoprocedimentos')->where('statusServico','Em Andamento')->count();
        $faturamentoAnual = DB::table('pagamentoprocedimentos')->sum('valorProcedimento');
        $faturamentoMes = DB::table('pagamentoprocedimentos')->whereMonth('dataPagamento', 'MONTH(CURRENT_DATE())')->sum('valorProcedimento');
        // echo $users;
        return view('admin.Home', compact('serviceFinalized', 'serviceProgress', 'faturamentoAnual', 'faturamentoMes'));
    }


}
