<?php

namespace App\Http\Controllers;

use App\Models\Procedimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcedimentoController extends Controller
{
    //
    public function index()
    {
        $procedures = DB::select('select * from procedimentos');
        return view('admin.procedure.show', compact('procedures'));
    }

    public function create()
    {
        return view('admin.procedure.create');
    }
    public function save(Request $request)
    {
        // dd($_POST);
        if($request->input('_token') != '' && $request->input('id') == '')
        {
            $request->validate([
                'nomeProcedimento' => 'required',
                'descricaoProcedimento' => 'required',
                'valorProcedimento' => 'required',
            ],
            [
                'nomeProcedimento.required' => 'O campo Nome Procedimento deve ser preenchido',
                'descricaoProcedimento.required' => 'O campo Descrição deve ser preenchido',
                'valorProcedimento.required' => 'O campo Valor deve ser preenchido'
            ]);
    
            Procedimento::create($request->all());
            $msg = 'Cadastrado com sucesso';
            return view('admin.procedure.create' , ['msg'=> $msg ]);
        }
        

        if($request->input('_token') != '' && $request->input('id') != '')
        {
            $nome = $request->input('nomeProcedimento');
            $descricao = $request->input('descricaoProcedimento');
            $valor = $request->input('valorProcedimento');
            
            $update =DB::update("update procedimentos set nomeProcedimento = '$nome', descricaoProcedimento = '$descricao' ,valorProcedimento= '$valor' where idProcedimento = ?", [$request->input('id')]);
            if($update)
            {
                $msg = 'Procedimento Atualizado Com sucesso';
                return redirect()->route('admin.procedure');
                
            }else {
                // $msg = 'Erro ao atualizar Procedimento';
                return redirect()->route('admin.procedure');
            }
        }
        
    }

    public function edit(Request $request,$id)
    {
        $procedure = Procedimento::where('idProcedimento', $id)->get()->first();
        // dd($procedure->nomeProcedimento);
        return view('admin.procedure.update', compact('procedure'));
    }
}
