<?php

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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('role', 'Admin\RoleController', ['except' => ['show', 'destroy']]);

    Route::resource('semester', 'Admin\SemesterController');
    Route::resource('subject', 'Admin\SubjectController');

    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('teacher', 'TeacherController');
    Route::resource('student', 'StudentController');
    Route::resource('study_class', 'StudyClassController');
    Route::resource('department', 'DepartmentController');
    Route::resource('material', 'MaterialController');
    Route::resource('assignment', 'AssignmentController');
    Route::resource('content', 'ContentController');
    
    Route::get('activity_log', 'HomeController@activityLog')->name('activity_log.index');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'Admin\PageController@index']);
});
