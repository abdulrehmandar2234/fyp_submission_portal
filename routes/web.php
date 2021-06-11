<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentApplicationController;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\RegistrationController;
use App\Http\Controllers\Group\MidTermReportController;
use App\Http\Controllers\Group\ProfileController;
use App\Http\Controllers\Group\ProposalController as GroupProposalController;
use App\Http\Controllers\Supervisor\MidTermReportController as SupervisorMidTermReportController;
use App\Http\Controllers\Supervisor\ProposalController as SupervisorProposalController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/', function () {return view('backend.index');})->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('applications', StudentApplicationController::class);
        Route::resource('groups', GroupController::class);
        Route::resource('supervisors', SupervisorController::class);
    });
});

Route::prefix('group')->group(function () {
    Route::group(['middleware' => ['auth', 'role:group']], function () {
        Route::get('/', function () {return view('backend.index');})->name('dashboard');
        Route::get('supervisors', [GroupProposalController::class, 'index'])->name('supervisors.index');
        Route::get('report-status', [MidTermReportController::class, 'status'])->name('report.status');
        Route::resource('proposals', GroupProposalController::class);
        Route::resource('mid-term-report', MidTermReportController::class);
        Route::post('update-profile', [ProfileController::class, 'changePassword'])->name('change.password');
        Route::resource('profile', ProfileController::class);

    });
});

Route::prefix('supervisor')->group(function () {
    Route::group(['middleware' => ['auth', 'role:supervisor']], function () {
        Route::get('/', function () {return view('backend.index');})->name('dashboard');
        Route::resource('student-proposals', SupervisorProposalController::class);
        Route::resource('mid-term-report', SupervisorMidTermReportController::class);
        Route::post('update-profile', [ProfileController::class, 'changePassword'])->name('change.password');
        Route::resource('profile', ProfileController::class);
    });
});

Route::resource('registration', RegistrationController::class);

require __DIR__ . '/auth.php';
