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
Route::get('resumencliente/{Id_cliente}', 'KardesController@resumencliente');
Route::get('resumenclientepdf/{Id_cliente}', 'KardesController@resumenclientepdf');
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

Route::post('/savecerti', 'CertificadosController@savecerti');
Route::put('/reabrir', 'CertificadosController@reabrir');
Route::get('/consulta', 'CertificadosController@consulta');
Route::put('/listordenes', 'CertificadosController@listordenes');
Route::post('/savecerenvases', 'CertificadosController@store');
Route::put('/stock','CertificadosController@stock');
Route::put('/antistock/{Id_envase}','CertificadosController@antistock');
Route::get('certificados/{Id}/editenvase','CertificadosController@editenvase');
Route::put('finalizarcerti/{Id_certificado}','CertificadosController@finalizarcerti');
Route::put('certificados/{Id}','CertificadosController@updateenvase');
Route::get('certificados/tblcertificados','CertificadosController@tabla');
Route::get('certificados/{Id_certificado}/tblcertificadosedit','CertificadosController@tablaedit');

Route::post('/informedevoluciones', 'DevolucionesController@informedevoluciones')->name('informedevoluciones');
Route::post('/informecertificados', 'CertificadosController@informecertificados')->name('informecertificados');

Route::get('consultaenvase', 'pruebasController@consultaenvase');
Route::get('consultaproducto', 'pruebasController@consultaproducto');
Route::get('ordenfunt', 'pruebasController@ordenfunt');

Route::get('indexsoluciones', 'RemisionesController@indexsoluciones');
Route::get('remisionesconsecutivo', 'RemisionesController@consecutivo');
Route::get('remisionesdatoscliente', 'RemisionesController@datosclientes');
Route::get('remisionesdatosenvasecerti', 'RemisionesController@datosenvasecerti');
Route::get('recepciones', 'RemisionesController@envasesafuera');
Route::get('remisiones/{Id}/editdevolucion','RemisionesController@editdevolucion');
Route::post('guardardevolucion', 'RemisionesController@registrardevolucion');
Route::post('eliminarenvaseremision/{Id}', 'RemisionesController@eliminarenvaseremision');
Route::put('cambioenvasedevoluciones/{Id}', 'RemisionesController@cambioenvasedevoluciones');
Route::put('devolucionenvase/{Id}','RemisionesController@devolucionenvase');
Route::put('recibir/{Id}','RemisionesController@recibirenvase');
Route::get('remisiones.pdfindi/{Id_remision}', 'RemisionesController@exportpdfindi')->name('remisiones.pdfindi');
Route::post('informetotalremisiones', 'RemisionesController@informetotalremisiones')->name('informetotalremisiones');
Route::resource('pruebas','pruebasController');
Route::resource('certificados','CertifiEnvasesController');
Route::resource('certificados','CertificadosController');
Route::resource('remisiones','RemisionesController');
Route::resource('kardes','KardesController');
Route::resource('index','IndexController');
Route::resource('devoluciones','DevolucionesController');





Auth::routes();


