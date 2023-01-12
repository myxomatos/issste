<?php

use Illuminate\Support\Facades\Route;
use App\Exports\UsersExport;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\IncidenciasController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/export', function () {
    $usersExport = new UsersExport();
    return $usersExport->download('users.pdf');
//    return Excel::download(new UsersExport, 'users.xlsx');
});

//Route::get('/reporte',[ActividadesController::class,'reporte'])->name('reporte');
Route::get('/reporte/{inicio?}/{fin?}', [ActividadesController::class, 'reporteDate'])->name('reporteDate');

Route::get('/', function () {
   return view('login');
});

// Registro
Route::view('/registro', "register")->name('registro');
// Login
Route::view('/login', "login")->name('login');
// Home
Route::view('/home', "home")->middleware('auth')->name('home');



//Actividades
Route::get('/actividades', [ActividadesController::class, 'index'])->name('actividades');
//Create Actividades
Route::get('/actividades/create', [ActividadesController::class, 'createActividades'])->name('createActividades');
//Store Actividades
Route::post('/actividades/store', [ActividadesController::class, 'storeActividades'])->middleware('auth')->name('storeActividades');
//Show Actividades
Route::get('/actividades/{id}', [ActividadesController::class, 'showActividades'])->middleware('auth')->name('showActividades');
//Update Actividades
Route::post('/actividades/{id}/update', [ActividadesController::class, 'updateActividades'])->middleware('auth')->name('updateActividades');


//Create Incidencias
Route::get('/incidencias/create/{id}', [IncidenciasController::class, 'createIncidencias'])->middleware('auth')->name('createIncidencias');
//Store Incidencias
Route::post('/incidencias/store', [IncidenciasController::class, 'storeIncidencias'])->middleware('auth')->name('storeIncidencias');
//Show Incidencia
Route::get('/home/admin/incidencia/{id}', [AdminController::class, 'showIncidencia'])->middleware('auth')->name('showIncidencia');
//Edit Incidencia
Route::get('/home/admin/incidencia/{id}/edit', [IncidenciasController::class, 'editIncidencia'])->middleware('auth')->name('editIncidencia');
//Update Incidencia
Route::post('/home/admin/incidencia/{id}/update', [IncidenciasController::class, 'updateIncidencia'])->middleware('auth')->name('updateIncidencia');


//Validacion
Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');

//Inicia Sesion
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');

//Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Home Admin
Route::get('/home/admin', [AdminController::class, 'index'])->middleware('auth')->name('homeIndexPanel');

//Index Hospitales
Route::get('/home/admin/hospitales', [AdminController::class, 'hospitales'])->middleware('auth')->name('hospitalesIndex');
//Crear Hospital
Route::get('/home/admin/hospital/create', [AdminController::class, 'createHospital'])->middleware('auth')->name('createHospital');
//Store Hospitales
Route::post('/home/admin/hospitales/store', [AdminController::class, 'storehospital'])->middleware('auth')->name('storeHospital');
//Edit Hospital
Route::get('/home/admin/hospital/{id}/edit', [AdminController::class, 'editHospital'])->middleware('auth')->name('editHospital');
//Update Hospital
Route::post('/home/admin/hospita/{id}/update/', [AdminController::class, 'updateHospital'])->middleware('auth')->name('updateHospital');


//Crear Colaborador
Route::get('/home/admin/colaborador/create', [AdminController::class, 'createColaborador'])->middleware('auth')->name('createColaborador');
//Store Colaboradores
Route::post('/home/admin/colaborador/store', [AdminController::class, 'storeColaborador'])->middleware('auth')->name('storeColaborador');

//Index Subcoordinadores
Route::get('/home/admin/subcoordinadores', [AdminController::class, 'subcoordinadores'])->middleware('auth')->name('subcoordinadoresIndex');

//Index Enlaces
Route::get('/home/admin/enlaces', [AdminController::class, 'enlaces'])->middleware('auth')->name('enlacesIndex');
//Edit Enlaces
Route::get('/home/admin/enlace/{id}/edit', [AdminController::class, 'editEnlace'])->middleware('auth')->name('editEnlace');
//Update Enlaces
Route::post('/home/admin/enlace/{id}/update/', [AdminController::class, 'updateEnlace'])->middleware('auth')->name('updateEnlace');
//Show Censos
Route::get('/home/admin/censos', [AdminController::class, 'indexCensos'])->middleware('auth')->name('indexCensos');
//Sistema Aeropuerto
Route::get('/home/admin/aeropuerto', [AdminController::class, 'aeropuerto'])->middleware('auth')->name('aeropuerto');
//Directorio
Route::get('/home/admin/directorio', [AdminController::class, 'directorio'])->middleware('auth')->name('directorio');
//AJAX Search
Route::get('/search', [AdminController::class, 'search'])->name('search');

//Create Censos
Route::get('/home/admin/censo/create', [AdminController::class, 'createCenso'])->middleware('auth')->name('createCenso');

//Store Censo
Route::post('/home/admin/censo/store', [AdminController::class, 'storeCenso'])->middleware('auth')->name('storeCenso');

//Edit Censo
Route::get('/home/admin/censo/edit/{id}', [AdminController::class, 'editCenso'])->middleware('auth')->name('editCenso');

//Update Censo
Route::post('/home/admin/censo/update/{id}', [AdminController::class, 'updateCenso'])->middleware('auth')->name('updateCenso');

//Perfil
Route::get('/home/user', [AdminController::class, 'perfil'])->middleware('auth')->name('perfil');

//Admin General por Hospital
Route::view('/admin/general', "admin.indexGeneral")->middleware('auth')->name('indexGeneral');

//Show Historico Censo
Route::get('/home/admin/censo/{id}/historico', [AdminController::class, 'historicoCenso'])->middleware('auth')->name('showHistoricoCenso');
//INDEX TRUNCATE
Route::get('/home/admin/admin', [\App\Http\Controllers\CronJobController::class, 'Indextruncate'])->middleware('auth')->name('IndexTruncateAdmin');
//TRUNCATE
Route::get('/home/admin/truncate', [\App\Http\Controllers\CronJobController::class, 'truncate'])->middleware('auth')->name('TruncateAdmin');

