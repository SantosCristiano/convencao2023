<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

$this->group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

    $this->any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');
    $this->get('historic', 'BalanceController@historic')->name('admin.historic');

    $this->post('transfer', 'BalanceController@transferStore')->name('transfer.store');

    $this->post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
    $this->get('transfer', 'BalanceController@transfer')->name('balance.transfer');

    $this->post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
    $this->get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

    $this->post('deposit', 'BalanceController@depositStore')->name('deposit.store');
    $this->get('deposit', 'BalanceController@deposit')->name('balance.deposit');
    $this->get('balance', 'BalanceController@index')->name('admin.balance');

    $this->get('/', 'AdminController@index')->name('admin.home');

    //Rota para Report Inscritos
    $this->get('report', 'ReportController@index')->name('admin.report');

    //Rota para Report search
    $this->post('report', 'ReportController@searchReport')->name('report.search');

    //Rota para Report Transfer
    $this->get('checkin', 'ReportController@checkin')->name('admin.checkin');

    //Rota para Report Pagamento
    $this->get('pagamento', 'ReportController@pagamento')->name('admin.pagamento');

     //Rota para Report Acompanhantes
     $this->get('acompanhante', 'ReportController@acompanhante')->name('admin.acompanhante');

    //Rota para Exports to Excel
    $this->get('/export_excel/excelInscritos', 'ExportExcelController@excelInscritos')->name('export_excel.excelInscritos');
    $this->get('/export_excel/excelTransfer', 'ExportExcelController@excelTransfer')->name('export_excel.excelTransfer');
    $this->get('/export_excel/excelFinanceiro', 'ExportExcelController@excelFinanceiro')->name('export_excel.excelFinanceiro');
    $this->get('/export_excel/excelAcompanhante', 'ExportExcelController@excelAcompanhante')->name('export_excel.excelAcompanhante');

    //Rota para exports to PDF
    $this->get('/export_pdf/pdfInscritos', 'ExportPdfController@pdfInscritos')->name('export_pdf.pdfInscritos');


    //Rota para envio de Email
    //$this->get('email', 'appController@index')->name('admin.email');

    $this->get('enviarEmail', 'appController@enviarEmail')->name('admin.email');

});

$this->post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
$this->get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');

$this->get('/', 'Site\SiteController@index')->name('home');

$this->get('/inscricao', 'Site\SiteController@inscricao')->name('home.inscricao');

$this->post('/inscricao', 'Site\SiteController@cadastroStore')->name('cadastro.store');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
