<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AmbientController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'Home.home')->name('home');
Route::view('/quienes-somos', 'quienes-somos.index')->name('quienes-somos');

// Áreas
Route::get('area', [AreaController::class, 'index'])->name('area.index');
Route::get('area/create', [AreaController::class, 'create'])->name('area.create');
Route::post('area/store', [AreaController::class, 'store'])->name('area.store');
Route::get('area/{area}/edit', [AreaController::class, 'edit'])->name('area.edit');
Route::put('area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');
Route::get('area/{area}', [AreaController::class, 'show'])->name('area.show');

// Computadores
Route::get('computer', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::post('computer/store', [ComputerController::class, 'store'])->name('computer.store');
Route::get('computer/{computer}/edit', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');
Route::get('computer/{computer}', [ComputerController::class, 'show'])->name('computer.show');

// Centros de Formación
Route::get('training-center', [TrainingCenterController::class, 'index'])->name('training_center.index');
Route::get('training-center/create', [TrainingCenterController::class, 'create'])->name('training_center.create');
Route::post('training-center/store', [TrainingCenterController::class, 'store'])->name('training_center.store');
Route::get('training-center/{training_center}/edit', [TrainingCenterController::class, 'edit'])->name('training_center.edit');
Route::put('training-center/{training_center}', [TrainingCenterController::class, 'update'])->name('training_center.update');
Route::delete('training-center/{training_center}', [TrainingCenterController::class, 'destroy'])->name('training_center.destroy');
Route::get('training-center/{training_center}', [TrainingCenterController::class, 'show'])->name('training_center.show');

// Cursos
Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('course/store', [CourseController::class, 'store'])->name('course.store');
Route::get('course/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('course/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
Route::get('course/{course}', [CourseController::class, 'show'])->name('course.show');

// Aprendices
Route::get('apprentice', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');
Route::post('apprentice/store', [ApprenticeController::class, 'store'])->name('apprentice.store');
Route::get('apprentice/{apprentice}/edit', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentice/{apprentice}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('apprentice/{apprentice}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');
Route::get('apprentice/{apprentice}', [ApprenticeController::class, 'show'])->name('apprentice.show');


// Instructores
Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('teacher/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
Route::get('teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');

// Ambientes
Route::get('ambients', [AmbientController::class, 'index'])->name('ambients.index');
Route::get('ambients/create', [AmbientController::class, 'create'])->name('ambients.create');
Route::post('ambients/store', [AmbientController::class, 'store'])->name('ambients.store');
Route::get('ambients/{ambient}', [AmbientController::class, 'show'])->name('ambients.show');
Route::get('ambients/{ambient}/edit', [AmbientController::class, 'edit'])->name('ambients.edit');
Route::put('ambients/{ambient}', [AmbientController::class, 'update'])->name('ambients.update');
Route::delete('ambients/{ambient}', [AmbientController::class, 'destroy'])->name('ambients.destroy');

// Rutas de Ofertas
Route::get('offers', [OfferController::class, 'index'])->name('offers.index');
Route::get('offers/create', [OfferController::class, 'create'])->name('offers.create');
Route::post('offers/store', [OfferController::class, 'store'])->name('offers.store');
Route::get('offers/{offer}', [OfferController::class, 'show'])->name('offers.show');
Route::get('offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
Route::put('offers/{offer}', [OfferController::class, 'update'])->name('offers.update');
Route::delete('offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
