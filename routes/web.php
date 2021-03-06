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

//Routes - Todos os Usuários
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('tema/{id}/{slug}','TemaController@show');
Route::get('tema/total/{id}','TemaController@totalvotos');
Route::get('tema/opcoes/{id}','TemaController@opcoesvotos');
Route::get('tema/listaopcoes/{id}','Admin\TemaController@ListarOpcoes');
Route::post('tema/{id}/{slug}','TemaController@adicionar_voto');

//Routes - Todos os Usuários Logados
Route::middleware(['auth'])->prefix('painel')->group(function(){
  Route::get('/', 'Admin\PainelController@index');

  Route::get('adicionar-tema','Admin\TemaController@novaenquete');
  Route::post('adicionar-tema','Admin\TemaController@criarenquete');

  Route::get('meus-temas','Admin\TemaController@listar_por_usuario');

  Route::get('deletar-tema/{id}','Admin\TemaController@destroy');

  Route::get('editar-tema/{id}','Admin\TemaController@showtemaedit');
  Route::post('editar-tema','Admin\TemaController@updateenquete');

  //Routes - Todos os Usuários de level:0
  Route::middleware(['level:0'])->group(function () {
  });
  //Routes - Todos os Usuários de level:1
  Route::middleware(['level:1'])->group(function () {
    Route::get('listar-temas','Admin\TemaController@listar_temas');
    Route::get('listar-removidos','Admin\TemaController@listar_removidos');

    Route::get('ativar-tema/{id}','Admin\TemaController@ativar');
  });
});
