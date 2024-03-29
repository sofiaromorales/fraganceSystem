<?php

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

Route::get('/', 'WelcomeController@index');

Route::get('/Evaluacion', 'Evaluación\EvaluacionController@index');
Route::get('/Evaluacion/{id}', 'Evaluación\EvaluacionDetailController@view');
Route::get('/Evaluacion/creacion-formula-inicial/{id}', 'Evaluación\FormulaInicialController@view');
Route::get('/Evaluacion/creacion-escala/{id}', 'Evaluación\EscalaController@view');
Route::get('/Evaluacion/registro-proveedor/{id}', 'Evaluación\RegistroProveedorController@view');
Route::get('/Evaluacion/creacion-contrato/{id_productor}/{id_proveedor}', 'Evaluación\EvaluacionContratoController@view');
Route::get('/Evaluacion/resultado/{id_productor}/{id_proveedor}', 'Evaluación\EvaluacionResultadoController@view');
Route::get('/Evaluacion/generacion-contrato/{id_productor}/{id_proveedor}', 'Evaluación\GeneracionContratoController@view');
Route::get('/Evaluacion/detalle-contrato/{id_productor}/{id_proveedor}/{id_contrato}', 'Evaluación\ContratoDetailController@view');
Route::get('/Evaluacion/formula-final/{id_productor}', 'Evaluación\FormulaFinalController@view');
Route::get('/Evaluacion/formula-final/resultado/{id_productor}/{id_proveedor}', 'Evaluación\FormulaFinalController@view');
Route::get('/Evaluacion/formula-final/renovar/{id_productor}/{id_proveedor}/{cod_contrato}', 'Evaluación\EvaluacionFinalResultadoController@renueva');
Route::get('/Evaluacion/contrato/cancelar/{id_productor}/{id_proveedor}/{id_contrato}', 'Evaluación\ContratoCancelarController@view');


Route::post('/Evaluacion/creacion-formula-inicial/create/{id}', 'Evaluación\FormulaInicialController@create');
Route::post('/Evaluacion/creacion-escala/create/{id}', 'Evaluación\EscalaController@create');
Route::post('/Evaluacion/creacion-contrato/evaluar/{id_productor}/{ID_PROVEEDOR}', 'Evaluación\EvaluacionContratoController@evaluar');
Route::post('/Evaluacion/generacion-contrato/create/{id_productor}/{id_proveedor}', 'Evaluación\GeneracionContratoController@create');
Route::post('/Evaluacion/creacion-formula-final/create/{id}', 'Evaluación\FormulaFinalController@create');
Route::post('/Evaluacion/evaluacion-final/{id_productor}/{id_proveedor}/{cod_contrato}', 'Evaluación\contratoDetailController@evaluarFinal');
Route::post('/Evaluacion/contrato/cancelar-contrato/{id_productor}/{id_proveedor}/{id_contrato}', 'Evaluación\ContratoCancelarController@cancelar');



Route::get('/Compras', 'Compras\ComprasController@view');
Route::get('/Compras/menu/{id}', 'Compras\ComprasMenuController@view');
Route::get('/Compras/proveedor/{id_productor}/{id_proveedor}', 'Compras\ComprasProveedorController@view');
Route::get('/Compras/realizar-compra/{id_productor}/{id_proveedor}', 'Compras\ComprasRealizarController@view');
Route::get('/Compras/realizar-compra/envio/{id_productor}/{id_proveedor}/{pedido}/{det_pedido}', 'Compras\ComprasRealizarController@viewEnvio');
Route::get('/Compras/realizar-compra/create-envio/{id_productor}/{id_proveedor}/{codigo_cond_envio}/{tipo_transporte}', 'Compras\ComprasRealizarController@createEnvio');
Route::get('/Compras/realizar-compra/metodo-pago/{id_productor}/{id_proveedor}', 'Compras\ComprasRealizarController@metodoPagoView');
Route::get('/Compras/realizar-compra/metodo-pago/{id_productor}/{id_proveedor}/{cod_cond_pago}', 'Compras\ComprasRealizarController@metodoPagoCreate');
Route::get('/Compras/realizar-compra/confirmar/{id_productor}/{id_proveedor}', 'Compras\ComprasRealizarController@pedidoCreate');
Route::get('/Compras/pedido/detalle/{id_productor}/{id_proveedor}/{id_pedido}', 'Compras\PedidoDetailController@view');
Route::get('/Compras/pedido/detalle/recibido/{id_productor}/{id_proveedor}/{id_pedido}', 'Compras\PedidoDetailController@recibido');



Route::post('/Compras/realizar-compra/create-productos/{id_productor}/{id_proveedor}', 'Compras\ComprasRealizarController@createProductos');





Route::get('/Recomendador', 'RecomendadorController@index');

Route::get('/Productor', 'WelcomeProductorController@index');
Route::get('/ProductorCatalogo/{id}', 'ProductorController@view');




// Route::get('/', function () {
//     return view('welcome');
// });
//
// Route::get('/', 'HomeController@index');
// Route::get('/libro/{id}', 'LibroController@view');
// Route::post('/create', 'LibroController@create');
