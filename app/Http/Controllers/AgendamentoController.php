<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AgendamentoController extends Controller
{
    //
    public function index()
    {

        $scheduling = DB::table('agendamentoprocedimento')
                    ->join('clientes', 'agendamentoprocedimento.IdCliente', '=', 'clientes.idCliente')
                    ->join('procedimentos', 'agendamentoprocedimento.IdProcedimento', '=', 'procedimentos.idProcedimento')->get();
               
        return view('admin.scheduling.show', compact('scheduling'));
    }

    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           
           case 'update':
              $event = Agendamento::find($request->id)->update([
                  'title' => $request->IdCliente,
                  'start' => $request->dataAgendamento,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Agendamento::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
    public function create()
    {
        $procedure = DB::table('procedimentos')->get();
        $clients = DB::table('clientes')->get();
        return view('admin.scheduling.create', compact('procedure', 'clients'));
    }

    public function save (Request $request)
    {

        // @dd($request->all());
        $scheduling = new Agendamento;

        $scheduling->IdProcedimento = $request->Procedimento_idProcedimento;
        $scheduling->IdCliente = $request->Cliente_idCliente;
        $scheduling->dataAgendamento = $request->dataAgendamento;

        // var_dump($scheduling->dataAgendamento);


        $scheduling->save();

        // Agendamento::create($request->all());
        return redirect()->route('admin.scheduling');
    }
}
