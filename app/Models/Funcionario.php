<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [   
        'idFuncionario',	
        'nomeFuncionario',	
        'cpfFuncionario',	
        'emailFuncionario',	
        'telefoneFuncionario',	
        'rua',	
        'bairro',	
        'numCasa',	
        'cep',	
        'cidade',	
        'estado',	
        'senha',	
        'tipoUser',	
        'created_at',	
        'updated_at',	
    ];
    
}
