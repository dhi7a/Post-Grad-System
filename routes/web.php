<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationFinishedController;
use App\Http\Controllers\UniversityStudiesController;
use App\Http\Controllers\DissertationController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\EmploymentExperienceController;
use App\Http\Controllers\PersonalDetailsController;
use App\Http\Controllers\ProposedFieldStudyController;
use App\Http\Controllers\RefereesController;
use App\Http\Controllers\RelevantPublicationsController;
use App\Http\Controllers\ResearchExperienceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\WizardController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\VerificationController;
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
    return view('/auth/login');
});
Route::get('/downloads', function () {
    return view('student/downloads');
});

// Route::get('/verify-phone', function () {
//     return view('auth.verify-phone');
// })->name('verify.phone');
// Route::post('/verify-phone', function () {
//     return view('auth.verify-phone');
// })->name('verify.phone');

Route::get('/verify-phone', [VerificationController::class, 'showVerificationForm'])->name('verify.phone');
Route::post('/verify-phone', [VerificationController::class, 'handleVerification']);

// Route::get('/verify-code', [VerificationController::class, 'showVerificationCodeForm']);
// Route::post('/verify-code', [VerificationController::class, 'handleVerificationCode']);

Route::get('/verify-phone', [VerificationController::class, 'showVerificationForm'])->name('verify.phone');
Route::post('/verify-phone', [VerificationController::class, 'handleVerification']);
Route::get('/verify-code', [VerificationController::class, 'showVerificationCodeForm'])->name('verify.code');
Route::post('/verify-code', [VerificationController::class, 'handleVerificationCode']);



Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');


// Routes for User Role
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('User_dashboard', 'App\Http\Controllers\UserController@index')->name('user-dashboard');
    Route::get('/apply', 'App\Http\Controllers\ApplicationController@index');
    Route::post('/apply/submit', 'App\Http\Controllers\ApplicationController@store')->name('apply.submit');
});

// Routes for Student Role
// Route::group(['middleware' => ['auth', 'role:student']], function () {
//     Route::get('/Student', 'App\Http\Controllers\StudentController@index')->name('student-dashboard');
//     Route::get('/apply', 'App\Http\Controllers\ApplicationController@index');
//     Route::post('/apply/submit', 'App\Http\Controllers\ApplicationController@store')->name('apply.submit');
//     Route::get('/documents', [DocumentsController::class, 'index'])->name('documents.index');
//     Route::post('/documents', [DocumentsController::class, 'store'])->name('documents.store');
//     Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
//     Route::get('/applications', [ApplicationController::class, 'store'])->name('applications.store');
//     Route::post('/personal-details', [PersonalDetailsController::class, 'store'])->name('personal-details.store');
//     Route::get('/university-studies', [UniversityStudiesController::class, 'index'])->name('university-studies.index');
//     Route::post('/university-studies', [UniversityStudiesController::class, 'store'])->name('university-studies.store');
//     Route::get('/diploma', [DiplomaController::class, 'index'])->name('diploma.index');
//     Route::post('/diploma', [DiplomaController::class, 'store'])->name('diploma.store');
//     Route::get('/dissertation', [DissertationController::class, 'index'])->name('dissertation.index');
//     Route::post('/dissertation', [DissertationController::class, 'store'])->name('dissertation.store');
//     Route::get('/employment-experience', [EmploymentExperienceController::class, 'index'])->name('employment-experience.index');
//     Route::post('/employment-experience', [EmploymentExperienceController::class, 'store'])->name('employment-experience.store');
//     Route::get('/proposed-field', [ProposedFieldStudyController::class, 'index'])->name('proposed-field.index');
//     Route::post('/proposed-field', [ProposedFieldStudyController::class, 'store'])->name('proposed-field.store');
//     Route::get('/referees', [RefereesController::class, 'index'])->name('referees.index');
//     Route::post('/referees', [RefereesController::class, 'store'])->name('referees.store');
//     Route::get('/research-experience', [ResearchExperienceController::class, 'index'])->name('research-experience.index');
//     Route::post('/research-experience', [ResearchExperienceController::class, 'store'])->name('research-experience.store');
//     Route::get('/publications', [RelevantPublicationsController::class, 'index'])->name('publications.index');
//     Route::post('/publications', [RelevantPublicationsController::class, 'store'])->name('publications.store');
//     Route::get('/publications/create', [RelevantPublicationsController::class, 'create'])->name('publications.create');
//     Route::post('/publications', [RelevantPublicationsController::class, 'store'])->name('publications.store');
//     Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
//     Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store');
//     Route::get('/finished', [ApplicationFinishedController::class, 'index'])->name('finished.index');


// });
// Routes for Student Role
// Route::group(['middleware' => ['auth', 'role:student', 'verified', 'verified.number']], function () {
Route::group(['middleware' => ['auth', 'role:student', 'verified']], function () {
    // Route::get('/Student', 'App\Http\Controllers\StudentController@index')->middleware(['verified.number'])->name('student-dashboard');
    Route::get('/Student', 'App\Http\Controllers\StudentController@index')->name('student-dashboard');
    Route::get('/apply', 'App\Http\Controllers\ApplicationController@index');
    Route::post('/apply/submit', 'App\Http\Controllers\ApplicationController@store')->name('apply.submit');
    Route::get('/documents', [DocumentsController::class, 'index'])->name('documents.index');
    Route::post('/documents', [DocumentsController::class, 'store'])->name('documents.store');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::get('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::post('/personal-details', [PersonalDetailsController::class, 'store'])->name('personal-details.store');
    Route::get('/university-studies', [UniversityStudiesController::class, 'index'])->name('university-studies.index');
    Route::post('/university-studies', [UniversityStudiesController::class, 'store'])->name('university-studies.store');
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
    Route::get('/finished', [ApplicationFinishedController::class, 'index'])->name('finished.index');
});




// Routes for Faculty Role
Route::group(['middleware' => ['auth', 'role:faculty']], function () {
    Route::get('Faculty_dashboard', 'App\Http\Controllers\FacultyController@index')->name('faculty-dashboard');
});

// Routes for Administrator Role
Route::group(['middleware' => ['auth', 'role:administrator']], function () {
    Route::get('admin', 'App\Http\Controllers\AdminController@index')->name('admin-dashboard');

});

// Routes for Supervisor Role
Route::group(['middleware' => ['auth', 'role:supervisor']], function () {
    Route::get('Supervisor', 'App\Http\Controllers\SupervisorController@index')->name('supervisor-dashboard');

    Route::get('/students', function () { return view('students');
    });


});



Route::get('/apply', function () {
    return view('apply');
})->middleware(['auth', 'verified'])->name('apply');
Route::post('/apply', [ApplicationController::class, 'store'])->middleware(['auth', 'verified'])->name('apply');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Email Verification
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

// Route::get('/verify-phone', [VerificationController::class, 'showVerificationForm']);
// Route::post('/verify-phone', [VerificationController::class, 'showVerificationForm']);


Route::get('/download/{filename}', function ($filename) {
    $path = 'C:\Users\TendaiM\Documents\laravel\PGS2\downloads\\' . $filename;

    if (file_exists($path)) {
        return Response::download($path);
    } else {
        abort(404);
    }
})->name('download.file');

Route::post('/wizard/submit', 'WizardController@submit')->name('wizard.submit');
Route::get('/wizard/submit', 'WizardController@submit')->name('wizard.submit');

Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'register']);

Route::get('/verification', [RegisteredUserController::class, 'showVerificationForm'])->name('verification');
Route::post('/verification', [RegisteredUserController::class, 'verify']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


require __DIR__.'/auth.php';
