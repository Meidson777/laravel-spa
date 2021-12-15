<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ScannController extends Controller
{
    //

    public function index()
    {
        return view('admin.scann.index');
    }

    public function create($id)
    {
        $employee = DB::table('funcionarios')->get();
        $procedure = DB::table('procedimentos')->get();
        $client = Cliente::where('idCliente', $id)->get();
        $qrcode = DB::table('qrcode')->where('Code_idCliente', '=', 0)->orderBy('code', 'asc')->get();
        // dd($client);
        return view('admin.scann.create-service', compact('employee', 'procedure', 'client', 'qrcode'));
    }

    public function show($id)
    {
        $code = DB::table('qrcode')->where('idQrCode', '=', $id)->get();
        
        // echo $code;
        if(isset($code[0]->Code_idCliente)){
            if($code[0]->Code_idCliente != 0 )
            {
                $id = $code[0]->Code_idCliente;
                $services = DB::table('servicoprocedimentos')
                ->join('clientes', 'servicoprocedimentos.Cliente_idCliente', '=', 'clientes.idCliente')
                ->join('procedimentos', 'servicoprocedimentos.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
                ->join('funcionarios', 'servicoprocedimentos.Funcionario_idFuncionario', '=', 'funcionarios.idFuncionario')
                ->where('Cliente_idCliente', '=', $id)
                ->orderBy('statusServico')
                ->paginate(10);
                return view('admin.scann.show', compact('services'));
    
            }    
            else{
                echo '<div class="alert alert-warning m-3" id="success-alert" role="alert">
                    QrCode não associado!
                </div>';
                return view('admin.scann.index');
            }
        }else{
            echo '<div class="alert alert-danger m-3" role="alert" id="success-alert">
                    QrCode não cadastrado!
                </div>';
            return view('admin.scann.index');
        }
        // if(isset($code[0]->Code_idCliente)){
            
        
    }
}
