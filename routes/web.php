<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Mail\SendEmailUsingGmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Response;

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
Route::get('/downloads', function () {
    return view('student/downloads'); 
});
// Route::get('/profile.html', function () {
//     return view('profile'); 
// });

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');



Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('User_dashboard', 'App\Http\Controllers\UserController@index')->name('user-dashboard');
    Route::get('/apply', 'App\Http\Controllers\ApplicationController@index');
    Route::post('/apply/submit', 'App\Http\Controllers\ApplicationController@store')->name('apply.submit');
});

Route::group(['middleware' => ['auth', 'role:student']], function () {
    Route::get('Student', 'App\Http\Controllers\StudentController@index')->name('student-dashboard');
    Route::get('/apply', 'App\Http\Controllers\ApplicationController@index');
    Route::post('/apply/submit', 'App\Http\Controllers\ApplicationController@store')->name('apply.submit');
    Route::post('/downloads', )->name('downloads');
    
});


Route::group(['middleware' => ['auth', 'role:faculty']], function () {
    Route::get('Faculty_dashboard', 'App\Http\Controllers\FacultyController@index')->name('faculty-dashboard');
});

Route::group(['middleware' => ['auth', 'role:administrator']], function () {
    Route::get('admin', 'App\Http\Controllers\AdminController@index')->name('admin-dashboard');

});

Route::group(['middleware' => ['auth', 'role:supervisor']], function () {
    Route::get('Supervisor', 'App\Http\Controllers\SupervisorController@index')->name('supervisor-dashboard');
   
    Route::get('/students', function () { return view('students');
    });
    

});

// Route::get('/phd-enrollment', 'PhdEnrollmentController@index');
// Route::post('/phd-enrollment', 'PhdEnrollmentController@store');




Route::get('/apply', function () {
    return view('apply');
})->middleware(['auth', 'verified'])->name('apply');
Route::post('/apply', [ApplicationController::class, 'store'])->middleware(['auth', 'verified'])->name('apply');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/profile', function () {
//     // Only verified users may access this route...
// })->middleware(['auth', 'verified']);

//auth::routes(['verify' => true]);

// Route::get('/apply', [ApplicationController::class, 'index'])->name('apply');


Route::get('send-email-using-gmail', function(){

    Mail::to('edworkprojects@gmail.com')->send(new SendEmailUsingGmail());

    return "Mail sent";
});

Route::get('/download/{filename}', function ($filename) {
    $path = 'C:\Users\TendaiM\Documents\laravel\PGS2\downloads\\' . $filename;
    
    if (file_exists($path)) {
        return Response::download($path);
    } else {
        abort(404);
    }
})->name('download.file');

require __DIR__.'/auth.php';
