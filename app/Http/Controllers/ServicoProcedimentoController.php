<?php

namespace App\Http\Controllers;

use App\Models\PagamentoProcedimento;
use App\Models\ServicoProcedimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicoProcedimentoController extends Controller
{
    //

    public function index()
    {
        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];

        if ($user_type != 0) {

            $services = DB::table('servicoprocedimentos')
                ->join('clientes', 'servicoprocedimentos.Cliente_idCliente', '=', 'clientes.idCliente')
                ->join('procedimentos', 'servicoprocedimentos.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
                ->join('funcionarios', 'servicoprocedimentos.Funcionario_idFuncionario', '=', 'funcionarios.idFuncionario')
                ->paginate(10);
        } else {

            $services = DB::table('servicoprocedimentos')
                ->join('clientes', 'servicoprocedimentos.Cliente_idCliente', '=', 'clientes.idCliente')
                ->join('procedimentos', 'servicoprocedimentos.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
                ->join('funcionarios', 'servicoprocedimentos.Funcionario_idFuncionario', '=', 'funcionarios.idFuncionario')
                ->where('Funcionario_idFuncionario', '=', $user_id)
                ->paginate(10);
        }

        return view('admin.service.show', compact('services'));
    }

    public function status($status)
    {
        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];

        if ($user_type != 0) {

            $services = DB::table('servicoprocedimentos')
                ->join('clientes', 'servicoprocedimentos.Cliente_idCliente', '=', 'clientes.idCliente')
                ->join('procedimentos', 'servicoprocedimentos.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
                ->join('funcionarios', 'servicoprocedimentos.Funcionario_idFuncionario', '=', 'funcionarios.idFuncionario')
                ->where('statusServico', '=', $status)

                // ->orderBy('created_at')
                ->paginate(10);
        } else {
            $services = DB::table('servicoprocedimentos')
                ->join('clientes', 'servicoprocedimentos.Cliente_idCliente', '=', 'clientes.idCliente')
                ->join('procedimentos', 'servicoprocedimentos.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
                ->join('funcionarios', 'servicoprocedimentos.Funcionario_idFuncionario', '=', 'funcionarios.idFuncionario')
                ->where('statusServico', '=', $status)
                ->where('Funcionario_idFuncionario', '=', $user_id)
                ->paginate(10);
        }

        return view('admin.service.show', compact('services'));
    }

    public function create()
    {
        $employee = DB::table('funcionarios')->get();
        $procedure = DB::table('procedimentos')->get();
        $clients = DB::table('clientes')->get();
        $qrcode = DB::table('qrcode')->where('Code_idCliente', '=', 0)->orderBy('code', 'asc')->get();
        return view('admin.service.create', compact('employee', 'procedure', 'clients', 'qrcode'));
    }

    public function save(Request $request)
    {
        $count = DB::table('servicoprocedimentos')

            // ->where('statusServico', '=', 'Em Andamento')
            ->where('Cliente_idCliente', '=', $request->input('Cliente_idCliente'))
            ->where('statusServico', '=', 'Em Andamento')->count();

        // echo $count;
        if ($count != 0) {

            // echo ' tem qrcode';
            ServicoProcedimento::create($request->all());
            return redirect()->route('admin.services-status', 'Em Andamento');
        } else {
            // echo 'não tem qrcode';
            ServicoProcedimento::create($request->all());

            DB::update('update qrcode set Code_idCliente = ? where idQrCode = ?', [$request->input('Cliente_idCliente'), $request->input('qrcode')]);
            return redirect()->route('admin.services-status', 'Em Andamento');
        }
    }

    public function finish($id)
    {
        $service = DB::table('servicoprocedimentos')
            ->join('procedimentos', 'servicoprocedimentos.Procedimento_idProcedimento', '=', 'procedimentos.idProcedimento')
            ->join('clientes', 'servicoprocedimentos.Cliente_idCliente', '=', 'clientes.idCliente')
            ->where('idServico', '=', $id)
            ->get();

        // $service = DB::table('servicoprocedimentos');
        return view('admin.service.finish', compact('service'));
    }
    public function finish_full(Request $request)
    {

        $pagamento = true;
        if (isset($pagamento)) {
            // dd($request->all());
            // PagamentoProcedimento::create($request->all());

            $save = PagamentoProcedimento::create([
                'valorPagamento' => $request->input('valorPagamento'),
                'valorProcedimento' => $request->input('valorProce'),
                'tipoPagamento' => $request->input('tipoPagamento'),
                'troco' => $request->input('troco'),
                'Servico_idServico' => $request->input('Servico_idServico'),
                'Servico_IdCliente' => $request->input('Servico_IdCliente'),
                'Servico_IdProcedimento' => $request->input('Servico_IdProcedimento'),
            ]);

            $save->save();

            $procedure_uses = DB::table('procedimentoutilizaproduto')->where('Procedimento_idProcedimento', '=', $request->input('Servico_IdProcedimento'))->get();
            foreach ($procedure_uses as $item) {
                // atualiza a tabela de estoque 
                DB::update("update estoques set qtd = qtd - '$item->qtdUtilizado' where Produto_idProduto = '$item->Produto_idProduto'");
            }
            $count = DB::table('servicoprocedimentos')
                ->where('Cliente_idCliente', '=', $request->input('Servico_IdCliente'))
                ->where('statusServico', '=', 'Em Andamento')->count();
            // echo $count;
            if ($count == 1) {
                // atualiza a tabela de qrcode quando o cliente usa o qrcode
                DB::update('update qrcode set Code_idCliente = ? where Code_idCliente = ?', [0, $request->input('Servico_IdCliente')]);
            }
            DB::update('update servicoprocedimentos set statusServico = ? where idServico = ?', ['Finalizado', $request->input('Servico_idServico')]);
            return redirect()->route('admin.services');
        }
    }

   
}
