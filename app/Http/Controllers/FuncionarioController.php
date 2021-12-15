<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    //
    public function index()
    {
        $employees = DB::select('select * from funcionarios');
        return view('admin.employee.show', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function save(Request $request)
    {

        // Realizar validação dos dados recebidos no request
        $request->validate([
            
            'nomeFuncionario' => 'required',	
            'cpfFuncionario' => 'required|unique:funcionarios',	
            'emailFuncionario' => 'email',
            'senha' => 'required',
            'senha2' => 'required|same:senha',		
            'telefoneFuncionario' => 'required',		
            'rua' => 'required',	
            'bairro' => 'required',	
            'numCasa' => 'required',	
            'cep' => 'required',	
            'cidade' => 'required',	
            'estado' => 'required',	
                
        ],
        [
            'nomeFuncionario.required' => 'O campo nome deve ser preenchido',
            'cpfFuncionario.required' => 'O campo cpf deve ser preenchido',
            'cpfFuncionario.unique' => 'CPF já está cadastrado',
            'emailFuncionario.required' => 'O campo email deve ser preenchido',
            'senha.required' => 'O campo senha deve ser preenchido',
            'senha2.required' => 'O campo confirmar senha deve ser preenchido',
            'senha2.same' => 'Senhas diferentes',
            'telefoneFuncionario.required' => 'O campo telefone deve ser preenchido',
            'rua.required' => 'O campo rua deve ser preenchido',
            'bairro.required' => 'O campo bairro deve ser preenchido',
            'numCasa.required' => 'O campo N° deve ser preenchido',
            'cep.required' => 'O campo cep deve ser preenchido',
            'cidade.required' => 'O campo cidade deve ser preenchido',
            'estado.required' => 'O campo estado deve ser preenchido',
        ]);

        $funcionario = new Funcionario();
                
        $funcionario->nomeFuncionario = mb_strtoupper($request->get('nomeFuncionario'));
        $funcionario->cpfFuncionario = $request->get('cpfFuncionario');
        $funcionario->emailFuncionario = $request->get('emailFuncionario');
        $funcionario->senha = sha1($request->get('senha'));
        $funcionario->telefoneFuncionario = $request->get('telefoneFuncionario');
        $funcionario->rua = $request->get('rua');
        $funcionario->bairro = $request->get('bairro');
        $funcionario->numCasa = $request->get('numCasa');
        $funcionario->cep = $request->get('cep');
        $funcionario->cidade = $request->get('cidade');
        $funcionario->estado = $request->get('estado');
        

        Funcionario::create($funcionario->getAttributes());
        return redirect()->route('admin.employees');
    }

    public function billing($id)
    {
        $erro = 1;
    
        if($_SESSION['user_type'] != 0)
        {
            $revenue_employee = DB::table('pagamentoprocedimentos')
                    ->join('servicoprocedimentos', 'pagamentoprocedimentos.Servico_idServico', '=', 'servicoprocedimentos.idServico' )
                    ->join('procedimentos', 'pagamentoprocedimentos.Servico_IdProcedimento', '=', 'procedimentos.idProcedimento')
                    ->join('clientes', 'pagamentoprocedimentos.Servico_IdCliente', '=', 'clientes.idCliente')->where('Funcionario_idFuncionario', $id)
                    ->paginate(10);
        }else{
            
            if($id != $_SESSION['user_id']){
                return redirect()->route('admin.home', ['erro' => $erro]);
            }else{
                $revenue_employee = DB::table('pagamentoprocedimentos')
                    ->join('servicoprocedimentos', 'pagamentoprocedimentos.Servico_idServico', '=', 'servicoprocedimentos.idServico' )
                    ->join('procedimentos', 'pagamentoprocedimentos.Servico_IdProcedimento', '=', 'procedimentos.idProcedimento')
                    ->join('clientes', 'pagamentoprocedimentos.Servico_IdCliente', '=', 'clientes.idCliente')
                    ->where('servicoprocedimentos.Funcionario_idFuncionario', $id)
                    ->paginate(10);
            }
        }
        return view('admin.employee.revenues', compact('revenue_employee'));
    }
}
