<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\LdapTestCotroller;
use App\Http\Controllers\DashboardController;

// Livewire components
use App\Http\Livewire\Tasks as TasksController;
use App\Http\Livewire\Orders;
use App\Http\Livewire\FileDropzone;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FilesController;

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
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::guard('web')->attempt($credentials)) {
        // Аутентификация успешна
        return redirect()->intended('/dashboard');
    } else {
        // Аутентификация не удалась
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
})->middleware('guest')->name('login');

Route::get('/ldap-test', [LdapTestCotroller::class, 'index']);
Route::get('/test', function(){
    return view('layouts.app')->with([
        'slot' => view('upload')
    ]);
});

Route::post('/orders/{slug}', [OrderController::class, 'store']);

Route::get('/orders/{slug}', Orders::class)->middleware('auth');
Route::get('tasks', TasksController::class)->middleware('auth');

Route::post('/files/store', [FilesController::class,'store'])->name('store');
Route::post('/files/upload', [FilesController::class,'upload'])->name('upload');