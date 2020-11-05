<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 ** Mentor Route API
 ** GET, POST, PUT, DELETE 
 * 
 * */
Route::get('mentors', 'MentorController@index');
Route::get('mentors/{id}', 'MentorController@show');
Route::post('mentors', 'MentorController@create');
Route::put('mentors/{id}', 'MentorController@update');
Route::delete('mentors/{id}', 'MentorController@destroy');


/**
 ** Course Route API
 ** GET, POST, PUT, DELETE 
 * 
 * */
Route::get('courses', 'CourseController@index');
Route::get('courses/{slug}', 'CourseController@show');
Route::post('courses', 'CourseController@create');
Route::put('courses/{id}', 'CourseController@update');
Route::delete('courses/{id}', 'CourseController@destroy');


/**
 ** Chapter Route API
 ** GET, POST, PUT, DELETE 
 * 
 * */
Route::get('chapters', 'ChapterController@index');
Route::get('chapters/{id}', 'ChapterController@show');
Route::post('chapters', 'ChapterController@create');
Route::put('chapters/{id}', 'ChapterController@update');
Route::delete('chapters/{id}', 'ChapterController@destroy');

/**
 ** Lesson Route API
 ** GET, POST, PUT, DELETE 
 * 
 * */
Route::get('lessons', 'LessonController@index');
Route::get('lessons/{id}', 'LessonController@show');
Route::post('lessons', 'LessonController@create');
Route::put('lessons/{id}', 'LessonController@update');
Route::delete('lessons/{id}', 'LessonController@destroy');

/**
 ** Image Course Route API
 ** POST & DELETE 
 * 
 * */
Route::post('image-courses', 'ImageCourseController@create');
Route::delete('image-courses/{id}', 'ImageCourseController@destroy');

/**
 ** My Course Route API
 ** GET & POST 
 * 
 * */
Route::get('my-courses', 'MyCourseController@index');
Route::post('my-courses', 'MyCourseController@create');

/**
 ** Review Route API
 ** POST, PUT, DELETE 
 * 
 * */
Route::post('reviews', 'ReviewController@create');
Route::put('reviews/{id}', 'ReviewController@update');
Route::delete('reviews/{id}', 'ReviewController@destroy');

/**
 ** Tool Route API
 ** POST, PUT, DELETE 
 * 
 * */
Route::get('tools', 'ToolController@index');
Route::get('tools/{id}', 'ToolController@show');
Route::post('tools', 'ToolController@create');
Route::put('tools/{id}', 'ToolController@update');
Route::delete('tools/{id}', 'ToolController@destroy');
