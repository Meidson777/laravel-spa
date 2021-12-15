<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    //
    public function index()
    {
        $products = DB::select('select * from produtos');
        return view('admin.products.show', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function save(Request $request)
    {
       
        if($request->input('_token') != '' && $request->input('idProduto') == '')
        {
            $request->validate([
                'nomeProduto' => 'required',
                'descricaoProduto' => 'required',
                'valorCompra'=> 'required|numeric',
                // 'valorVenda' => 'numeric',
            ],
            [
                'nomeProduto.required' => 'O campo Nome Produto deve ser preenchido',
                'descricaoProduto.required' => 'O campo Descrição deve ser preenchido',
                'valorCompra.required' => 'O campo Valor Compra deve ser preenchido',
                'valorCompra.numeric' => 'O campo Valor Compra deve numerico',
                // 'valorVenda.numeric' => 'O campo Valor Venda deve numerico',
            ]);
    
            Produto::create($request->all());
            return redirect()->route('admin.products');
        }
        

        if($request->input('_token') != '' && $request->input('idProduto') != '')
        {
            
            $nome = $request->input('nomeProduto');
            $descricao = $request->input('descricaoProduto');

            // echo $nome;
            $update =DB::update("update produtos set nomeProduto = '$nome', descricaoProduto = '$descricao' where idProduto = ?", [$request->input('idProduto')]);
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

    public function update($id)
    {
        // echo $id;
        $product = Produto::where('idProduto', $id)->get()->first();
        // dd($procedure->nomeProcedimento);
        return view('admin.products.update', compact('product'));
    }
}
