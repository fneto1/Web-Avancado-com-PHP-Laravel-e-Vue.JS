<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

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

/*Route::get($uri, $callback);*/

/* Route::get('/', function () {
    return "Iniciando com rotas";
}); */

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::get('/login', function() {return "login";} )->name('site.login');

//agrupando rotas
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {return "clientes";})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function() {return "produtos";})->name('app.produtos');
});

//rota de fallback

Route::fallback(function(){
    echo ' Rota inexistente. <a href="'.route('site.index').'">Clique aqui</a> para retornar a pagina inicial ';
});

//encaminhando parametros da rota para o controlador
Route::get('/teste/{p1}/{p2}', 'TesteController@teste' )->name('teste');

/* //redirecionando rotas
Route::get('/rota1', function(){
    echo 'rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Route::redirect('/rota2', '/rota1');
 */

//recebendo parametros

/* Route::get('/contato/{nome}', function(string $nome) {
    echo "Estamos aqui, " .$nome;
} ); */

/* Route::get('/contato/{nome}/{profissao}', function(string $nome, string $profissao) {
    echo "Estamos aqui, " .$nome. ". Você é um: ".  $profissao;
} );
 */

//parametros opcionais
/* Route::get('/contato/{nome}/{profissao}/{mensagem?}', function(string $nome, string $profissao, string $mensagem = 'Novo funcionário') {
    echo "Estamos aqui, $nome. Você é um: $profissao - $mensagem";
} ); */

//controlando parâmetros
/* Route::get('/contato/{nome}/{categoria_id}', function(string $nome, int $categoria_id) {
    echo "Estamos aqui, $nome - $categoria_id ";
} )->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+'); */

