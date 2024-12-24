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
        'title' => 'Gantungan Kunci - UKKI',
        'image' => 'assets/img/ganci.jpeg',
        'price' => 15000,
        'in_stock' => 24
       ],
       (object) [
        'title' => 'Jersey - UKM Badminton',
        'image' => 'assets/img/jersey.jpeg',
        'price' => 100000,
        'in_stock' => 30
       ],
       /* (object) [
        'title' => 'Vicious Pain',
        'image' => 'assets/img/vicious.jpeg',
        'price' => 300,
        'in_stock' => 25
       ],
       (object) [
        'title' => 'Ciello',
        'image' => 'assets/img/ciello.jpg',
        'price' => 250,
        'in_stock' => 40
       ],
 */
    ]
])->name('products.index');

// Route::get('/home', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'processLogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/pesanan/hasil', [PesananController::class, 'hasil'])->name('pesanan.hasil');
Route::post('/pesanan/download', [PesananController::class, 'download'])->name('pesanan.download');
Route::resource('pesanan', PesananController::class);

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
