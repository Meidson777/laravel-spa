<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagamentoProcedimento extends Model
{
    use HasFactory;

    protected $fillable = [
        
    'idPagamentoProcedimento',	
    'valorPagamento',	
    'valorProcedimento',	
    'dataPagamento',	
    'tipoPagamento',	
    'troco',	
    'Servico_idServico',	
    'Servico_IdCliente',	
    'Servico_IdProcedimento',
	
    ]; 
}
