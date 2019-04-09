<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/marcas',"QualitasController@getMarcas");
Route::get('/submarca/{uso}/{marca}/{submarca}/{modelo}',"QualitasController@getSubmarcas");

Route::get('/modelos/{uso}/{marca}/{submarca}/{modelo}',"QualitasController@getModelos");
Route::get('/tarifas','WebServiceController@getTarifas');
// Route::get('/emitir','WebServiceController@emitirPoliza');
// Route::get('/emitirGS','GeneralSegurosController@emitir');
Route::post('/cotizacion','ClienteController@store');
Route::post('/searchCliente','ClienteController@search');
Route::post('/getCoberturasQ','QualitasController@getCobertura');


Route::get('/versionesGS/{marca}/{submarca}/{modelo}','GeneralSegurosController@versiones');
Route::get('/getMarcas','GeneralSegurosController@getMarcas');
Route::get('/getSubmarcas/{marca_id}','GeneralSegurosController@getSubmarcas');
Route::get('/getModelos/{submarca_id}','GeneralSegurosController@getModelos');
Route::get('/getVersiones/{submarca_id}/{modelo}','GeneralSegurosController@getVersiones');
Route::get('/getContactos','GeneralSegurosController@getContactos');
Route::get('/getGiros','GeneralSegurosController@getGiros');
Route::get('/getEstadoCivil','GeneralSegurosController@getEstadoCivil');
Route::get('/getTitulos','GeneralSegurosController@getTitulos');

Route::post('/getCotizacionGS','GeneralSegurosController@getCotizacion');

Route::get('/getCoberturasGS/{cotizacion}/{paquete}','GeneralSegurosController@getCoberturas');

Route::get('/cp/{cp}','CPController@get');

// ANA SEGUROS
Route::get('/pruebaANA','API\AnaController@prueba');
Route::get('/bancosANA','API\AnaController@bancos');
Route::get('/categoriasANA','API\AnaController@categorias');
Route::get('/colorANA','API\AnaController@colores');
Route::get('/estadosANA','API\AnaController@estados');
Route::get('/municipiosANA/{estado}','API\AnaController@delMuns');
Route::get('/cpANA/{estado}/{ciudad}','API\AnaController@codigoPostales');
Route::get('/coloniaANA/{estado}/{ciudad}/{cp}','API\AnaController@colonias');
Route::get('/formaPagosANA','API\AnaController@formaPagos');
Route::get('/giroEmpresaANA','API\AnaController@giros');
Route::get('/identificacionesANA','API\AnaController@identificaciones');
Route::get('/nacionalidadANA','API\AnaController@nacionalidades');
Route::get('/ocupacionANA','API\AnaController@ocupaciones');
Route::post('/cotizacionANA','API\AnaController@cotizacion');
Route::get('/modelosANA','API\AnaController@modelos');
Route::get('/marcasANA/{modelo}','API\AnaController@marcas');
Route::get('/submarcaANA/{marca}/{modelo}','API\AnaController@subMarcas');
Route::get('/vehiculoANA/{marca}/{submarca}/{modelo}','API\AnaController@vehiculo');
Route::get('/catVehANA/{modeloMin}/{modeloMax}','API\AnaController@catalogoVehi');
