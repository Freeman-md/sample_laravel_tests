<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/takeChunk', [HomeController::class, 'takeChunk']);

Route::get('/whereContains', [HomeController::class, 'whereContains']);

Route::get('/superSorts', [HomeController::class, 'superSorts']);

Route::get('/mapVsEach', [HomeController::class, 'mapVsEach']);

Route::get('/mergeVsConcat', [HomeController::class, 'mergeVsConcat']);

Route::get('/groupBy', [HomeController::class, 'groupBy']);

Route::get('/pullEveryForgetPop', [HomeController::class, 'pullEveryForgetPop']);

Route::get('qrcode', function() {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('qrcode', function() {
    return $qrcode = QrCode::size(300)->email('momentumsmtp19@gmail.com', 'This is a qrcode generated email');

});

Route::view('example', 'example');