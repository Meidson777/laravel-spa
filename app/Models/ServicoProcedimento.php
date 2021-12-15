<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoProcedimento extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'idServico',
        'statusServico',	
        'Cliente_idCliente',	
        'Procedimento_idProcedimento',	
        'funcionario_idFuncionarioAuxiliar',	
        'Funcionario_idFuncionario',
    ];   

    protected $table = 'servicoprocedimentos';

}
