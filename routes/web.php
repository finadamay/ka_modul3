<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminController;

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
    return view('login');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::view('products', 'products.index', [
    'products' => [
       (object) [
        'title' => 'Test',
        'image' => 'https://images.unsplash.com/photo-1541643600914-78b084683601?q=80&w=1408&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'price' => 999,
        'in_stock' => 23
       ],
       (object) [
        'title' => 'Versace Eros',
        'image' => 'https://images.unsplash.com/photo-1587017539504-67cfbddac569?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'price' => 123,
        'in_stock' => 12
       ],
       (object) [
        'title' => 'Test3',
        'image' => 'https://images.unsplash.com/photo-1594035910387-fea47794261f?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'price' => 567,
        'in_stock' => 65
       ],
       (object) [
        'title' => 'Versace Eros',
        'image' => 'https://images.unsplash.com/photo-1587017539504-67cfbddac569?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'price' => 123,
        'in_stock' => 12
       ],
       (object) [
        'title' => 'Test3',
        'image' => 'https://images.unsplash.com/photo-1594035910387-fea47794261f?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'price' => 567,
        'in_stock' => 65
       ],
    ]
])->name('products.index');

// Route::get('/home', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'processLogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/pesan', [PesananController::class, 'showPesananForm'])->name('pesan');
Route::post('/pesan-add', [PesananController::class, 'store'])->name('pesan-store');
Route::get('/pesan-hasil', [PesananController::class, 'hasil'])->name('pesan-hasil');
Route::post('/pesan-download', [PesananController::class, 'download'])->name('pesan-download');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');