<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UniversityStudiesController;
use App\Http\Controllers\DissertationController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\EmploymentExperienceController;
use App\Http\Controllers\PersonalDetailsController;
use App\Http\Controllers\ProposedFieldStudyController;
use App\Http\Controllers\RefereesController;
use App\Http\Controllers\RelevantPublicationsController;
use App\Http\Controllers\ResearchExperienceController;
use App\Http\Controllers\SubjectsController;
use App\Mail\SendEmailUsingGmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::get('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::post('/personal-details', [PersonalDetailsController::class, 'store'])->name('personal-details.store');
    // Route::get('/university-studies', [UniversityStudiesController::class, 'index'])->name('university-studies.index');
    // Route::post('/university-studies', [UniversityStudiesController::class, 'store'])->name('university-studies.store');
    Route::get('/university-studies', [UniversityStudiesController::class, 'index'])->name('university-studies.index');
    Route::post('/university-studies', [UniversityStudiesController::class, 'store'])->name('university-studies.store');
    // Add other routes related to university studies here...
    Route::get('/diploma', [DiplomaController::class, 'index'])->name('diploma.index');
    Route::post('/diploma', [DiplomaController::class, 'store'])->name('diploma.store');
    Route::get('/dissertation', [DissertationController::class, 'index'])->name('dissertation.index');
    Route::post('/dissertation', [DissertationController::class, 'store'])->name('dissertation.store');
    Route::get('/employment-experience', [EmploymentExperienceController::class, 'index'])->name('employment-experience.index');
    Route::post('/employment-experience', [EmploymentExperienceController::class, 'store'])->name('employment-experience.store');
    Route::get('/proposed-field', [ProposedFieldStudyController::class, 'index'])->name('proposed-field.index');
    Route::post('/proposed-field', [ProposedFieldStudyController::class, 'store'])->name('proposed-field.store');
    Route::get('/referees', [RefereesController::class, 'index'])->name('referees.index');
    Route::post('/referees', [RefereesController::class, 'store'])->name('referees.store');
    Route::get('/research-experience', [ResearchExperienceController::class, 'index'])->name('research-experience.index');
    Route::post('/research-experience', [ResearchExperienceController::class, 'store'])->name('research-experience.store');
    Route::get('/publications', [RelevantPublicationsController::class, 'index'])->name('publications.index');
    Route::post('/publications', [RelevantPublicationsController::class, 'store'])->name('publications.store');
    Route::get('/publications/create', [RelevantPublicationsController::class, 'create'])->name('publications.create');
Route::post('/publications', [RelevantPublicationsController::class, 'store'])->name('publications.store');
    Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
    Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store');
    // Route::get('/university-studies/{id}', [UniversityStudiesController::class, 'show'])->name('university-studies.show');
    // Route::get('/university-studies/{id}/edit', [UniversityStudiesController::class, 'edit'])->name('university-studies.edit');
    // Route::put('/university-studies/{id}', [UniversityStudiesController::class, 'update'])->name('university-studies.update');
    // Route::delete('/university-studies/{id}', [UniversityStudiesController::class, 'destroy'])->name('university-studies.destroy');



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


// Route::get('send-email-using-gmail', function(){

//     Mail::to('edworkprojects@gmail.com')->send(new SendEmailUsingGmail());

//     return "Mail sent";
// });

Route::get('/download/{filename}', function ($filename) {
    $path = 'C:\Users\TendaiM\Documents\laravel\PGS2\downloads\\' . $filename;

    if (file_exists($path)) {
        return Response::download($path);
    } else {
        abort(404);
    }
})->name('download.file');

require __DIR__.'/auth.php';
