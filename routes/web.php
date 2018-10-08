<?php

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

Auth::routes();

Route::get('/', function() {
    return view('home');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('courses', 'Admin\CoursesController');
    Route::resource('accounts', 'Admin\AccountsController');

    Route::get('general', ['as'=> 'general', 'uses' => 'Admin\DashboardController@general']);
    Route::get('membership', ['as'=> 'membership', 'uses' => 'Admin\DashboardController@membership']);
});

Route::prefix('user')->name('user.')->group(function () {
    Route::patch('update', 'UserController@update')->name('update');
    Route::patch('update_password', 'UserController@update_password')->name('update_password');
});

Route::prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('profile', function() {
        return view('lecturer.profile');
    });

    Route::resource('courses', 'Lecturer\CoursesController');
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::post('/{course_id}/register', 'Lecturer\CoursesController@register')->name('register');
        Route::post('/{course_id}/unregister', 'Lecturer\CoursesController@unregister')->name('unregister');
        Route::delete('/{course_id}/remove_student/{student_id}', 'Lecturer\CoursesController@remove_student')->name('remove_student');

        Route::get('/{course_id}/add_post', function($course_id){
            return view('lecturer/courses/add_post', ['course_id' => $course_id]);
        })->name('add_post');
        Route::post('/{course_id}/store_post', 'Lecturer\CoursesController@store_post')->name('store_post');
    });

    Route::resource('students', 'Lecturer\StudentsController');
    Route::prefix('students')->name('students.')->group(function () {
        Route::delete('/{student_id}/remove_course/{course_id}', 'Lecturer\StudentsController@remove_course')->name('remove_course');
    });
});

Route::prefix('student')->name('student.')->group(function () {
    Route::get('profile', function() {
        return view('student.profile');
    });

    Route::resource('courses', 'Student\CoursesController');
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::post('/{course_id}/register', 'Student\CoursesController@register')->name('register');
        Route::post('/{course_id}/unregister', 'Student\CoursesController@unregister')->name('unregister');
    });
});
