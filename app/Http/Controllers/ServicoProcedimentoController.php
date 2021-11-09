<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicoProcedimentoController extends Controller
{
    //

    public function index()
    {
        $services = DB::table('servicoprocedimentos')
                    ->join('clientes', 'servicoprocedimentos.Cliente_idCliente', '=', 'clientes.idCliente')
                    ->join('procedimentos', 'servicoprocedimentos.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
                    ->join('funcionarios', 'servicoprocedimentos.Funcionario_idFuncionario', '=', 'funcionarios.idFuncionario')
                    ->paginate(10);
        // dd($services);
        return view('admin.service.show', compact('services'));
    }
}
