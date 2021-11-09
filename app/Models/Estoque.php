<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'idEstoque',	
        'qtd',	
        'qtdmin',	
        'Produto_idProduto',
    ]; 
}
