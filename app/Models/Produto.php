<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'idProduto',	
        'nomeProduto',	
        'descricaoProduto',	
        'tipoProduto',	
        'valorVenda',	
        'valorCompra',

    ]; 
}
