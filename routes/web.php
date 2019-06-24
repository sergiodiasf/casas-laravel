<?php

Route::get('/artisan/storage', function() {
    $command = 'storage:link';
    $result = Artisan::call($command);
    return Artisan::output();
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function() {
   Route::get('/', function() { return view('admin.index'); });
   Route::resource('barcos', 'BarcoController');
   Route::get('relbarcos', 'BarcoController@relbarcos');

   Route::resource('usuarios', 'UserController');
   Route::get('relusers', 'UserController@relusers');

   Route::get('barcosgraf', 'BarcoController@graf')
   ->name('barcos.graf');

   Route::resource('clientes', 'UUserController');
});

//Route::get('/admin', function() {
//    return view('admin.index');
//});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('site', 'ListaController');

Route::resource('proposta', 'PropostaController');
Route::resource('proposta_alugar', 'PropostaAluguelController');

Route::get('admin/relaluga', 'PropostaAluguelController@relaluga');
Route::get('admin/relcompra', 'PropostaController@relcompra');

Route::get('admin/propostas', 'PropostaController@index');
Route::get('admin/propostasaluguel', 'PropostaAluguelController@index');
Route::post('barcosfiltroscom', 'BarcoComercialController@filtros')->name('barcos.filtroscom');
// aqui seleciono a proposta
Route::get('admin/resposta{id}', 'PropostaController@responder')->name('propostas.resposta');
Route::post('admin/resposta', 'PropostaController@enviaEmail')->name('resposta');
Route::resource('admin/marcas', 'MarcaController');
Route::get('admin/propostagraf', 'PropostaController@graf')->name('proposta.graf');


