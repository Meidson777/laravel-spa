<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $fillable = [

    'idQrCode',	
    'code',	
    'Code_idCliente',

    ];

    // nome da chave primaria do banco qrcode
    protected $primaryKey = 'idQrCode';
    // muda o nome da tabela para o que esta no banco, não volta como o model QrCodes
    protected $table = 'qrcode';
    // faz com que o created_at e updated_at não sejam obrigatorios no banco
    public $timestamps = false;
}
