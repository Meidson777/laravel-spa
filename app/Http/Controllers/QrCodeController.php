<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QrCodeController extends Controller
{
    //
    public function index()
    {
        $qrcodes = DB::table('qrcode')->orderBy('code')
        ->paginate(10);

        return view('admin.qrcodes.show', compact('qrcodes'));
    }

    public function create()
    {
        return view('admin.qrcodes.create');
    }

    public function save(Request $request)
    {
         // Realizar validação dos dados recebidos no request
         $request->validate([
            
            'idQrCode' => 'required',	
            'code' => 'required|unique:qrcode',	
            'Code_idCliente' => 'integer',	
                
        ],
        [
            // 'code.integer' => 'Code precisa ser numerico',
            'code.unique' => 'Code já está cadastrado',
            
        ]);

        QrCode::create($request->all());
        return redirect()->route('admin.qrcodes');
    }

    public function findById($id)
    {
        $qrcode = DB::table('qrcode')
                    ->join('clientes', 'qrcode.Code_idCliente', '=', 'clientes.idCliente')
                    ->where('idQrCode', $id)->get();
        return view('admin.qrcodes.details', compact('qrcode'));
        // dd($qrcode);
    }
}
