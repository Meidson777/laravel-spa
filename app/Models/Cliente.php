<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [   
        
        'idCliente',	
        'nomeCliente',	
        'cpfCliente',	
        'emailCliente',	
        'ddd',	
        'telefoneCliente',	
        'dataNascimento',	
        'rua',	
        'bairro',	
        'numeroCasa',	
        'cep',	
        'cidade',	
        'estado',	
        'qrcode',
        'MsgEnv',	
    ];
}
