<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
{
    //
    public function index()
    {
        
        $inventorys = DB::table('estoques')->join('produtos', 'estoques.Produto_idProduto', '=', 'produtos.idProduto')->get();
        // dd($inventorys);
        return view('admin.inventory.show', compact('inventorys'));
    }
}
