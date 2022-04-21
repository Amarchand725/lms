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
Route::get('message', 'ChatSystemController@message')->name('student.message');
Route::post('chat-message', 'ChatSystemController@chat_message')->name('student.chat.message');
Route::post('chat-message-store', 'ChatSystemController@save_chat')->name('student.save.chat.message');
Route::get('mail-setting', 'MailSettingController@setting');
Route::get('calendar-show', 'EventController@index')->name('calendar.show');
Route::post('event-store/{id}', 'EventController@storing_event')->name('event.store');

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
    Route::resource('announcement', 'AnnouncementController');
    Route::resource('assignment', 'AssignmentController');
    Route::resource('content', 'ContentController');
    Route::resource('school_year', 'SchoolYearController');
    Route::resource('permission', 'PermissionController');
    //teacher
    Route::resource('assigned_class', 'AssignClassController');
    Route::resource('quiz', 'QuizController');
    Route::resource('question', 'QuestionController');
    Route::resource('study_class_quiz', 'StudyClassQuizController');
    Route::resource('share_file', 'ShareFileController');
    Route::resource('backpack', 'BackPackController');

    Route::get('activity_log', 'Admin\AdminController@activityLogs')->name('activity_log.index');
    Route::get('log/index', 'Admin\AdminController@userLogs')->name('log.index');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'Admin\PageController@index']);
    Route::get('donwloadables/{id}', 'ShareFileController@downloadale')->name('donwloadables');
    Route::get('backpack/delete', 'BackpackController@destroy')->name('backpack.delete');
    Route::get('notifications/show', 'StudentController@notifications')->name('notifications.show');
    Route::get('student/classmates/{study_class_id}', 'StudentController@classmates')->name('student.classmates');
});
