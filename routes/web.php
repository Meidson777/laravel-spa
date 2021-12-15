<?php

use App\Http\Controllers\AgendamentoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PagamentoProcedimentoController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\ProcedimentoUtilizaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ScannController;
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
    Route::get('/home/{erro?}', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/sair', [LoginController::class, 'logout'])->name('admin.logout'); 

    // Rota Administrativo
    Route::get('/administrative', function(){ return view('admin.administrative.menu'); })->name('admin.administrative');
    
    // Rota Agendamento
    Route::get('/scheduling', [AgendamentoController::class, 'index'])->name('admin.scheduling');
    Route::get('/scheduling-create', [AgendamentoController::class, 'create'])->name('admin.new-schedulings');
    Route::post('/scheduling-save', [AgendamentoController::class, 'save'])->name('admin.new-scheduling');

    // Rota Cliente
    Route::get('/clients', [ClienteController::class, 'listAll'])->name('admin.clients');
    Route::get('/new-client', [ClienteController::class, 'create'])->name('admin.create-client');
    Route::post('/new-client', [ClienteController::class, 'save'])->name('admin.create-client');
    Route::get('/client-details/{id}', [ClienteController::class, 'findById'])->name('details-client');
    Route::delete('/client-delete/{id}', [ClienteController::class, 'destroy'])->name('delete-client');

    // Rota Charts
    Route::get('/charts-billing', [PagamentoProcedimentoController::class, 'charts']);
    Route::get('/charts-move', [ServicoProcedimentoController::class, 'chart_move']);
    

    // Rota Estoque
    Route::get('/inventory', [EstoqueController::class, 'index'])->name('admin.inventory');
    Route::get('inventory-create', [EstoqueController::class, 'create'])->name('admin.create.inventory');
    Route::post('inventory-create', [EstoqueController::class, 'save'])->name('admin.create.inventory');

    // Rota Faturamento
    Route::get('/evenues', [PagamentoProcedimentoController::class, 'index'])->name('admin.evenues');
    Route::get('/evenues-month', [PagamentoProcedimentoController::class, 'showMes'])->name('admin.evenues-month');

    // Rota Funcionarios
    Route::get('/employee', [FuncionarioController::class, 'index'])->name('admin.employees');
    Route::get('/employee-create', [FuncionarioController::class, 'create'])->name('admin.create-employee');
    Route::post('/employee-create', [FuncionarioController::class, 'save'])->name('admin.create-employee');
    Route::get('/employee-billing/{id}', [FuncionarioController::class, 'billing'])->name('employee-billing');

    // Rota Procedimentos
    Route::get('/procedure', [ProcedimentoController::class, 'index'])->name('admin.procedure');
    Route::get('/new-procedure', [ProcedimentoController::class, 'create'])->name('admin.create-procedure');
    Route::post('/new-procedure', [ProcedimentoController::class, 'save'])->name('admin.create-procedure');
    Route::get('/procedure-edit/{id}', [ProcedimentoController::class, 'edit'])->name('admin.procedure-edit');

    // Rota Procedimento Utiliza
    Route::get('/procedure-uses', [ProcedimentoUtilizaController::class, 'index'])->name('admin.procedure-uses');
    Route::get('/procudure-uses/{id}', [ProcedimentoUtilizaController::class, 'show'])->name('admin.procedure_uses.details');
    Route::get('/procedure_uses-new/{erro?}/{great?}', [ProcedimentoUtilizaController::class, 'create'])->name('admin.create.procedure_uses');
    Route::post('/procedure_uses-new', [ProcedimentoUtilizaController::class, 'store'])->name('admin.create.procedure_uses');

    // Rota Produtos
    Route::get('/products', [ProdutoController::class, 'index'])->name('admin.products');
    Route::get('/new-product', [ProdutoController::class, 'create'])->name('admin.create-product');
    Route::post('/new-product', [ProdutoController::class, 'save'])->name('admin.create-product');
    Route::get('/products-edit/{id}', [ProdutoController::class, 'update'])->name('admin.update.product');

    // Rota QrCode
    Route::get('/qrcodes', [QrCodeController::class, 'index'])->name('admin.qrcodes');
    Route::get('/qrcode/{id}',[QrCodeController::class, 'findById'])->name('admin.details.qrcode');
    Route::get('/new-qrcode', [QrCodeController::class, 'create'])->name('admin.create.qrcode');
    Route::post('/new-qrcode', [QrCodeController::class, 'save'])->name('admin.create.qrcode');

    // Rota Scann
    Route::get('/scann', [ScannController::class, 'index'])->name('admin.scann');
    Route::get('/scann/{code?}', [ScannController::class, 'show'])->name('admin.scanned');
    Route::get('/scann-create/{id}', [ScannController::class, 'create'])->name('admin.scann-service');

    // Rota Serviços
    Route::get('/services', [ServicoProcedimentoController::class, 'index'])->name('admin.services');
    Route::get('/services/{status}', [ServicoProcedimentoController::class, 'status'])->name('admin.services-status');
    Route::get('/new-service', [ServicoProcedimentoController::class, 'create'])->name('admin.create-service');
    Route::post('/new-service', [ServicoProcedimentoController::class, 'save'])->name('admin.create-service');
    Route::get('finish-service/{id}', [ServicoProcedimentoController::class, 'finish'])->name('admin.finish-service');
    Route::post('finish-service/{id?}', [ServicoProcedimentoController::class, 'finish_full'])->name('admin.finish-service');
    
});

