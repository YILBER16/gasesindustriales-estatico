<?php

use Illuminate\Support\Facades\Route;

use RealRashid\SweetAlert\Facades\Alert;


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


Route::get('/', 'IndexController@index');

//Route::get('/empleados','App\Http\Controllers\EmpleadosController@index');

Route::post('import-empleados-excel', 'EmpleadosController@importexcel')->name('empleados.import.excel');
Route::post('import-clientes-excel', 'ClientesController@importexcel')->name('clientes.import.excel');
Route::post('import-proveedores-excel', 'ProveedoresController@importexcel')->name('proveedores.import.excel');
Route::post('import-propietarios-excel', 'PropietariosController@importexcel')->name('propietarios.import.excel');
Route::post('import-envases-excel', 'EnvasesController@importexcel')->name('envases.import.excel');
Route::get('empleados-pdf', 'EmpleadosController@exportpdf')->name('empleados.pdf');
Route::get('propietarios-pdf', 'PropietariosController@exportpdf')->name('propietarios.pdf');
Route::get('clientes-pdf', 'ClientesController@exportpdf')->name('clientes.pdf');
Route::get('proveedores-pdf', 'ProveedoresController@exportpdf')->name('proveedores.pdf');
Route::get('envases-pdf', 'EnvasesController@exportpdf')->name('envases.pdf');
Route::get('envases.pdfindi/{Id_envase}', 'EnvasesController@exportpdfindi')->name('envases.pdfindi');
Route::get('certificados.pdfindi/{Id_certificado}', 'CertificadosController@exportpdfindi')->name('certificados.pdfindi');
Route::get('kardes.pdfindi/{Id_envase}', 'KardesController@exportpdfindi')->name('kardes.pdfindi');
Route::get('remisiones.pdfindi/{Id_remision}', 'RemisionesController@exportpdfindi')->name('remisiones.pdfindi');
Route::post('/deleteDate', 'EmpleadosController@deleteDate');
Route::post('/deleteDate', 'ClientesController@deleteDate');
Route::post('/deleteDate', 'PropietariosController@deleteDate');
Route::post('/deleteDate', 'ProveedoresController@deleteDate');
Route::post('/deleteDate', 'EnvasesController@deleteDate');
Route::post('/deleteDateordenes', 'OrdenesController@deleteDateordenes');
Route::resource('empleados','EmpleadosController')->middleware('can:isAdmin');
Route::resource('clientes','ClientesController');
Route::resource('propietarios','PropietariosController');
Route::resource('proveedores','ProveedoresController');
Route::resource('envases','EnvasesController');
Route::post('login','Auth/LoginController@login')->name('login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('users','UsersController');
Route::resource('roles','RolesController');
Route::resource('ordenes','OrdenesController');
Route::get('/ordenfunt', 'CertificadosController@ordenfunt');
Route::post('/savecerti', 'CertificadosController@savecerti');
Route::put('/reabrir', 'CertificadosController@reabrir');
Route::get('/consulta', 'CertificadosController@consulta');
Route::get('/consultaenvase', 'CertificadosController@consultaenvase');
Route::put('/listordenes', 'CertificadosController@listordenes');
Route::post('/savecerenvases', 'CertificadosController@store');
Route::put('/stock','CertificadosController@stock');
Route::put('/antistock/{Id_envase}','CertificadosController@antistock');
Route::get('certificados/{Id}/editenvase','CertificadosController@editenvase');
Route::put('finalizarcerti/{Id_certificado}','CertificadosController@finalizarcerti');
Route::put('certificados/{Id}','CertificadosController@updateenvase');
Route::get('certificados/tblcertificados','CertificadosController@tabla');
Route::get('/consultaproducto', 'CertificadosController@consultaproducto');
Route::get('certificados/{Id_certificado}/tblcertificadosedit','CertificadosController@tablaedit');
//Route::get('certificados/tblcertificados','CertifiEnvasesController@tabla');
Route::get('/datosclientes', 'RemisionesController@datosclientes');
Route::get('/datosenvasecerti', 'RemisionesController@datosenvasecerti');
Route::put('/vendido/{Id}', 'RemisionesController@vendido');
Route::post('/saveremi', 'RemisionesController@saveremi');
Route::get('/consultaremi', 'RemisionesController@consultaremi');
Route::get('remisiones/tblremisiones','RemisionesController@tabla');

Route::post('/saveremienvases', 'RemisionesController@store');
Route::get('/kardes', 'RemisionesController@kardes');
Route::get('consultaenvasesprestados', 'RemisionesController@consultaenvasesprestados');
Route::get('/consultaenvaseremisiones', 'RemisionesController@consultaenvaseremisiones');
Route::put('/stockremisiones','RemisionesController@stockremisiones');
Route::put('/antistockremisiones/{Id_envase}','RemisionesController@antistockremisiones');

Route::get('remisiones/{Id_remision}/tblremisionesedit','RemisionesController@tablaedit');
Route::put('finalizarremi/{Id_remision}','RemisionesController@finalizarremi');
Route::get('/fetch_data', 'RemisionesController@fetch_data');
Route::get('remisiones/{Id}/editremision','RemisionesController@editremision');
Route::put('remisiones/{Id}','RemisionesController@updateenvase');
Route::put('/stockinventario/{Id_envase}','RemisionesController@stockinventario');
Route::put('/antistockinventario/{Id}','RemisionesController@antistockinventario');
Route::post('enviartabla', 'RemisionesController@enviartabla')->name('enviartabla');
Route::delete('eliminar/{Id}','RemisionesController@eliminar');
Route::get('/envasesafuera', 'RemisionesController@envasesafuera');
Route::post('/elimenvasedevoluciones/{Id}', 'RemisionesController@elimenvasedevoluciones');
Route::put('/stockenvasedevoluciones/{Id}', 'RemisionesController@stockenvasedevoluciones');
Route::post('registrardevolucion', 'RemisionesController@registrardevolucion');
Route::post('/informedevoluciones', 'DevolucionesController@informedevoluciones')->name('informedevoluciones');
Route::post('/informecertificados', 'CertificadosController@informecertificados')->name('informecertificados');
Route::post('/informeremisiones', 'RemisionesController@informeremisiones')->name('informeremisiones');
Route::resource('certificados','CertifiEnvasesController');
Route::resource('certificados','CertificadosController');
Route::resource('remisiones','RemisionesController');
Route::resource('kardes','KardesController');
Route::resource('index','IndexController');
Route::resource('devoluciones','DevolucionesController');





Auth::routes();


