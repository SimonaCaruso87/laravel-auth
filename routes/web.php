<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//controller
use App\Http\Controllers\Admin\DashboardController;
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

Route::middleware(['auth','verified'])
    //tutte le rotte che avremo qui dentro avranno il name che inzia con admin.
    ->name('admin.')
    //il prefisso della rotta sarà /admin
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])
        ->name('dashboard');
        //tutte le rotte qui dentro saranno protette dalla autenticazione.
});


// questa rotta è protetta dal middleware

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
