<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PagamentoProcedimentoController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ServicoProcedimentoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{erro?}', [LoginController::class, 'index'])->name('login-page');
Route::post('/login', [LoginController::class, 'autenticar'])->name('login-auth');


// só pode ser acessado se o usuario estiver logado
Route::middleware('autenticacao:padrao')->prefix('admin')->group(function () {

    // Rotas Principais
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/sair', [LoginController::class, 'logout'])->name('admin.logout');

    // Rota Administrativo
    Route::get('/administrative', function(){ return view('admin.administrative.menu'); })->name('admin.administrative');
    
    // Rota Cliente
    Route::get('/clients', [ClienteController::class, 'listAll'])->name('admin.clients');
    Route::get('/new-client', [ClienteController::class, 'create'])->name('admin.create-client');
    Route::post('/new-client', [ClienteController::class, 'save'])->name('admin.create-client');
    Route::get('/client-details/{id}', [ClienteController::class, 'findById'])->name('details-client');
    Route::delete('/client-delete/{id}', [ClienteController::class, 'destroy'])->name('delete-client');

    // Rota Estoque
    Route::get('/inventory', [EstoqueController::class, 'index'])->name('admin.inventory');

    // Rota Faturamento
    Route::get('/evenues', [PagamentoProcedimentoController::class, 'index'])->name('admin.evenues');
    Route::get('/evenues-month', [PagamentoProcedimentoController::class, 'showMes'])->name('admin.evenues-month');

    // Rota Funcionarios
    Route::get('/employee', [FuncionarioController::class, 'index'])->name('admin.employees');
    Route::get('/employee-create', [FuncionarioController::class, 'create'])->name('admin.create-employee');
    Route::post('/employee-create', [FuncionarioController::class, 'save'])->name('admin.create-employee');
    Route::get('/employee-billing', [FuncionarioController::class, 'billing'])->name('employee-billing');
    
    
    // Rota Procedimentos
    Route::get('/procedure', [ProcedimentoController::class, 'index'])->name('admin.procedure');
    Route::get('/new-procedure', [ProcedimentoController::class, 'create'])->name('admin.create-procedure');
    Route::post('/new-procedure', [ProcedimentoController::class, 'save'])->name('admin.create-procedure');
    Route::get('/procedure-edit/{id}', [ProcedimentoController::class, 'edit'])->name('admin.procedure-edit');

    // Rota Produtos
    Route::get('/products', [ProdutoController::class, 'index'])->name('admin.products');
    Route::get('/new-product', [ProdutoController::class, 'create'])->name('admin.create-product');
    Route::post('/new-product', [ProdutoController::class, 'save'])->name('admin.create-product');

    // Rota Serviços
    Route::get('/services', [ServicoProcedimentoController::class, 'index'])->name('admin.services');
    




});