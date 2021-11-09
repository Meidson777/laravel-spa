<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware(LogAcessoMiddleware::class);
    }

    public function index(){
        
        return view('admin.client.show');
    }

    public function listAll() {

        $users = DB::table('clientes')->paginate(10);
        // $users = DB::select('select * from clientes');
        return view('admin.client.show', compact('users'));

    }

    public function findById($id){
        
        $users = DB::table('clientes')->where('idCliente', $id)->get();
        return view('admin.client.details', compact('users'));

        
    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function save(Request $request)
    {

        // Realizar validação dos dados recebidos no request
        $request->validate([
            
            'nomeCliente' => 'required',	
            'cpfCliente' => 'required|unique:clientes',	
            'emailCliente' => 'email',	
            'ddd' => 'required',	
            'telefoneCliente' => 'required',		
            'rua' => 'required',	
            'bairro' => 'required',	
            'numeroCasa' => 'required',	
            'cep' => 'required',	
            'cidade' => 'required',	
            'estado' => 'required',	
                
        ],
        [
            'nomeCliente.required' => 'O campo nome deve ser preenchido',
            'cpfCliente.required' => 'O campo cpf deve ser preenchido',
            'cpfCliente.unique' => 'CPF já está cadastrado',
            'emailCliente.required' => 'O campo email deve ser preenchido',
            'ddd.required' => 'O campo ddd deve ser preenchido',
            'telefoneCliente.required' => 'O campo telefone deve ser preenchido',
            'rua.required' => 'O campo rua deve ser preenchido',
            'bairro.required' => 'O campo bairro deve ser preenchido',
            'numeroCasa.required' => 'O campo N° deve ser preenchido',
            'cep.required' => 'O campo cep deve ser preenchido',
            'cidade.required' => 'O campo cidade deve ser preenchido',
            'estado.required' => 'O campo estado deve ser preenchido',
        ]);
        Cliente::create($request->all());
        return redirect()->route('admin.clients');
    }

    public function destroy($id)
    {
        // DB::delete('delete from clientes where idCliente = ?', $id);
        // return redirect()->route('admin.client.show');
    }

}
