<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    

    Route::get('/admin', function () {
        return view('admin');
    });
    
    Route::get('/empleados', function () {
        return view('inicio_empleados');
    });

    Route::get('/empleados/crear', function () {
        return view('crear_empleado');
    });
    

    Route::get('/empleados/index', [EmpleadosController::class, 'index'])->name('empleados.index');
    Route::get('/empleados/crear', [EmpleadosController::class, 'create'])->name('empleados.create');
    Route::post('/empleados', [EmpleadosController::class, 'store'])->name('empleados.store');
    
    Route::get('/empleados/edit/{empleados}', [EmpleadosController::class, 'edit'])->name('empleados.edit');
    Route::post('/empleados/{empleados}', [EmpleadosController::class, 'update'])->name('empleados.update');
    
    Route::get('/empleados/{empleado}', [EmpleadosController::class, 'show'])->name('empleados.show');
    
    Route::delete('/empleados/{empleado}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');


    

});

?>
