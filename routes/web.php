<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenggunaController;

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
//Route::get('/', ['ArtikelController@show']);
Route::redirect('/artikel', 'getArticles');
Route::match(['get', 'post'], '/newArticle', [SiteController::class, 'newArticles']);
Route::get('/viewArticle/{id}', [SiteController::class, 'getArticles']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/home/dashboard', [SiteController::class, 'dashboard']);

Route::match(['get', 'post'], '/viewArticle', [SiteController::class, 'getArticles']);

// Route::resource('posts', ArtikelController::class);
// Route::resource('artikel', ArtikelController::class);
//Route::get('/', function(){
//     return view('/home/dashboard');
// });
Route::get('/add', [ArtikelController::class, 'create'] );
Route::post('/create', 'ArtikelController@create');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('register/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('register/login', [AuthController::class, 'login'])->name('login');
Route::get('register/register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register/register', [AuthController::class, 'register'])->name('register');


Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('register/home', [AuthController::class, 'home']);

});
//komentar
Route::get('pengguna', [PenggunaController::class, 'index']);
Route::resource('posts', PostController::class);
// Route::get('/', 'ContactController@index');
// //ContactControler adalah nama controler, sedangkan index adalah methodnya
// Route::get('/contacts/create', 'ContactController@create');
// Route::post('/contacts', 'ContactController@store');
// Route::get('/contacts/{id}/edit','ContactController@edit');
// Route::patch('/contacts/{id}','ContactController@update');
// Route::delete('/contacts/{id}','ContactController@destroy');