<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedimentoUtiliza extends Model
{
    use HasFactory;

    protected $fillable = [

        'idProcedimentoUtilizar',	
        'qtdUtilizado',	
        'Procedimento_idProcedimento',	
        'Produto_idProduto',	
    
        ];
    
        // nome da chave primaria do banco procedimentoutiliza
        protected $primaryKey = 'idProcedimentoUtilizar';
        // muda o nome da tabela para o que esta no banco, não volta como o model procedimentoutilizas
        protected $table = 'procedimentoutilizaproduto';
        // faz com que o created_at e updated_at não sejam obrigatorios no banco
        public $timestamps = false;
}
