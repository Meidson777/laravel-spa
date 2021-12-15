<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    //
    public function index()
    {
        $inventorys = DB::table('estoques')->join('produtos', 'estoques.Produto_idProduto', '=', 'produtos.idProduto')->get();
        return view('admin.inventory.show', compact('inventorys'));
    }

    public function create()
    {
        $products = DB::select('select * from produtos');
        return view('admin.inventory.create', compact('products'));
    }

    public function save(Request $request)
    {
        // Realizar validação dos dados recebidos no request
        $request->validate([
            
            'qtd' => 'required',	
            'Produto_idProduto' => 'required',	
        ],
        [
            'qtd.required' => 'O campo quantidade deve ser preenchido',
            'Produto_idProduto.required' => 'O campo produto deve ser selecionado',            
        ]);

        $count = DB::table('estoques')->where('Produto_idProduto', '=', $request->input('Produto_idProduto'))->count();
        
        
        if($count != 0){

            $inventory = DB::table('estoques')->where('Produto_idProduto', '=', $request->input('Produto_idProduto'))->get();
            $qtdAtual = $inventory[0]->qtd;
            $qtdUp = $qtdAtual + $request->input('qtd');
            DB::table('estoques')->where('Produto_idProduto', '=', $request->input('Produto_idProduto'))->update(['qtd' => $qtdUp]);
            // echo $qtdUp;
            // $update = DB::update("update estoques set qtd = '$qtdUp' WHERE Produto_idProduto = ?", [$request->input('id')]);
            // if($update)
            // {
            //     $msg = 'Estoque Atualizado com sucesso';
                return redirect()->route('admin.inventory');
                
            // }else {
            //     // $msg = 'Erro ao atualizar Procedimento';
            //     return redirect()->route('admin.inventory');
            // }

        }else{
           
            Estoque::create($request->all());
            $msg = 'Cadastrado com sucesso';
            return view('admin.inventory');
        }
       
        
    }
}
