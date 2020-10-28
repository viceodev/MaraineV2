<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Student\StudentPagesController;

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

//Website Pages Visitor
Route::get('/', function () {
    return view('welcome');
});

Route::get("/{role}/{username}", [StudentPagesController::class, 'profile'])->middleware('auth')->name('student.profile');


//auth pages
Route::get('login', [LoginController::class, 'show'])->name('login');
Route::get('register', [RegisterController::class, 'show'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//auth socials
Route::get('login/{provider}', [LoginController::class, 'socials'])->name('login.socials');
Route::get('login/{provider}/callback', [LoginController::class, 'socials_callback'])->name('login.socials.callback');


//student Pages
Route::middleware(['auth','student'])->prefix('student')->group(function(){
    Route::get('/', [StudentPagesController::class, 'home'])->name('student.home');
});

Route::post("/test", function(){
    return request()->all();
});