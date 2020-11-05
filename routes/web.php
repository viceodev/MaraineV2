<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Student\StudentPagesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTicketController;



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

Route::get('forgot-password', function(){
    return view('auth.password_reset');
})->name('password.request');

Route::get('/reset-password/{token}', function($token){
    return view('auth.reset_password', ['token' => $token]);
})->name('password.reset');



//auth pages
Route::middleware('guest')->group(function(){
Route::get('login', [LoginController::class, 'show'])->name('login');
Route::get('register', [RegisterController::class, 'show'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('forgot-password', [LoginController::class, 'forgot_instance'])->name('password.email');
Route::post('/reset-password', [LoginController::class, 'reset_password'])->name('password.update');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//auth socials
Route::get('login/{provider}', [LoginController::class, 'socials'])->name('login.socials');
Route::get('login/{provider}/callback', [LoginController::class, 'socials_callback'])->name('login.socials.callback');


//student Pages
Route::middleware(['auth','student'])->prefix('student')->group(function(){
    Route::get('/', [StudentPagesController::class, 'home'])->name('student.home');

    Route::middleware('courses')->prefix("/assignments")->group(function(){
     Route::get('/', [StudentPagesController::class, 'assignments'])->name('student.assignments'); 
     Route::get("/submit", [StudentPagesController::class, 'submit_show'])->name('student.assignments.submit');
     Route::get("/{status}", [StudentPagesController::class, 'single'])->name('student.assignments.status');
     Route::post("/submit", [StudentPagesController::class, 'assign_submit'])->name('student.assignments.submit');
     Route::post("/download/{filename}", [StudentPagesController::class, 'download'])->name('student.assignments.download');
    });

    Route::prefix('tickets')->group(function(){
        Route::get('/', [TicketsController::class, 'index'])->name('student.tickets');
        Route::get("/new", [TicketsController::class, 'create'])->name('student.tickets.new');
        Route::get("/{status}", [TicketsController::class, 'show'])->name('student.tickets.status');
        // Route::post("/submit", [TicketsController::class, 'update'])->name('student.tickets.new');
        Route::post("/new", [TicketsController::class, 'store'])->name('student.tickets.new');
        Route::post("/update", [TicketsController::class, 'update'])->name('student.tickets.update');
        Route::delete("/delete/{id}", [TicketsController::class, 'destroy'])->name('student.tickets.delete');
    });


    Route::prefix('payments')->group(function(){
        Route::view('/', 'student.payments.index')->name('student.payments');
    });
    
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
    Route::get("/", [AdminController::class, 'home'])->name('admin.home');

    Route::prefix('tickets')->group(function(){
      Route::get("/", [AdminTicketController::class, 'index'])->name('admin.tickets');
      Route::get("/{status}", [AdminTicketController::class, 'show'])->name('admin.tickets.single');
      Route::post("/store", [AdminTicketController::class, 'store'])->name('admin.tickets.store');
      Route::delete("/delete/{id}", [AdminTicketController::class, 'destroy'])->name('admin.tickets.delete');
    });
});

// Route::get("/test", function(){
//     return auth()->user();
// });

Route::get('/test', [StudentPagesController::class, 'test']);

Route::middleware(['auth'])->prefix('profile')->group(function(){
    Route::post("/image", [ProfileController::class, 'image_update'])->name('profile.image.update');
    Route::delete("/image", [ProfileController::class, 'delete_image'])->name('profile.image.delete');
    Route::post("/personal", [ProfileController::class, 'personal'])->name('profile.personal.update');
    Route::post("/password", [ProfileController::class, 'password'])->name('profile.password.update');
    Route::post("/preference", [ProfileController::class, 'preference'])->name('profile.preference.update');
    Route::post("/sessions", [ProfileController::class, 'sessionsLogout'])->name('profile.sessions.logout');
    Route::delete("/delete", [ProfileController::class, 'delete'])->name('profile.delete');
});

Route::middleware(['auth'])->prefix('payments')->group(function(){
    Route::get("/{provider}", [PagesController::class, 'payments'])->name('profile.payments');
});

Route::get("/register-course", [StudentPagesController::class, 'register_course'])->name('student.courses.register');
Route::post("/register-course", [StudentPagesController::class, 'course_update'])->name('student.courses.update');

Route::get("/{username}", [PagesController::class, 'profile'])->middleware('auth')->name('profile');

