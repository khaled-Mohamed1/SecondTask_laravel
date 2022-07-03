<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FamilyController;

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

Route::resource('employees', EmployeeController::class);

Route::resource('degrees', DegreeController::class);
Route::get('degrees/createdegree/{id}', [DegreeController::class, 'createdegree'])->name('degree.createone');
Route::post('degrees/storedegree/{id}', [DegreeController::class, 'storedegree'])->name('degree.storeone');

Route::resource('courses', CourseController::class);
Route::get('courses/createcourse/{id}', [CourseController::class, 'createcourse'])->name('course.createone');
Route::post('courses/storecourse/{id}', [CourseController::class, 'storecourse'])->name('course.storeone');

Route::resource('experiences', ExperienceController::class);
Route::get('experiences/createexperience/{id}', [ExperienceController::class, 'createexperience'])->name('experience.createone');
Route::post('experiences/storeexperience/{id}', [ExperienceController::class, 'storeexperience'])->name('experience.storeone');

Route::resource('families', FamilyController::class);
Route::get('families/createfamily/{id}', [FamilyController::class, 'createfamily'])->name('family.createone');
Route::post('families/storefamily/{id}', [FamilyController::class, 'storefamily'])->name('family.storeone');
