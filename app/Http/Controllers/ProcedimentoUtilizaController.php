<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProcedimentoUtiliza;

class ProcedimentoUtilizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $procedure_uses = DB::table('procedimentos')->get();
        
        return view('admin.procedure_uses.show', compact('procedure_uses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $msg = '';
        
        if($request->get('error') == 1)
        {
            $msg = 'Produto Utilizado já cadastrado';
        }
        if($request->get('great') == 1)
        {
            $msg = 'Produto cadastrado';
        }

        $procedure = DB::table('procedimentos')->get();
        $product = DB::table('produtos')->get();
        return view('admin.procedure_uses.create',['erro' => $msg], compact('procedure', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $idProduto = $request->input('Produto_idProduto');
        $idProcedimento = $request->input('Procedimento_idProcedimento');
        $count = DB::table('procedimentoutilizaproduto')
                        ->where('Procedimento_idProcedimento', '=', $idProcedimento)
                        ->where('Produto_idProduto', '=', $idProduto)->count();
        
        if($count != 0)
        {
            return redirect()->route('admin.create.procedure_uses', ['error' => 1]);

        }else{
            ProcedimentoUtiliza::create($request->all());
            return redirect()->route('admin.procedure-uses');
        }
        $request->validate([
            'qtdUtilizado' => 'required',
            // 'valorVenda' => 'numeric',
        ],
        [
            'qtdUtilizado.required' => 'O campo Quantidade deve ser preenchido',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $procedure_use = DB::table('procedimentoutilizaproduto')
                    ->join('procedimentos', 'procedimentoutilizaproduto.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
                    ->join('produtos', 'procedimentoutilizaproduto.Produto_idProduto', '=', 'produtos.idProduto')
                    ->where('Procedimento_idProcedimento', $id)->get();
        // dd($procedure_use);
        return view('admin.procedure_uses.details', compact('procedure_use'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
