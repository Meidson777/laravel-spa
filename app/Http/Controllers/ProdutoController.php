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
}
