<?php
Route::get('/', 'HomeController@welcome');

Route::get('/artisan', function() {
    $command = 'storage:link';
    $result = Artisan::call($command);
    return Artisan::output();
});


Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function() {
   Route::get('/', function() { return view('admin.index'); });
   Route::resource('casas', 'CasaController');
   Route::get('relcasas', 'CasaController@relcasas');

   Route::resource('usuarios', 'UserController');
   Route::get('relusers', 'UserController@relusers');

   Route::get('casasgraf', 'CasaController@graf')
   ->name('casas.graf');

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
Route::post('casasfiltroscom', 'CasaComercialController@filtros')->name('casas.filtroscom');
// aqui seleciono a proposta
Route::get('admin/resposta{id}', 'PropostaController@responder')->name('propostas.resposta');
Route::post('admin/resposta', 'PropostaController@enviaEmail')->name('resposta');
Route::resource('admin/tipos', 'TipoController');
Route::get('admin/propostagraf', 'PropostaController@graf')->name('proposta.graf');


