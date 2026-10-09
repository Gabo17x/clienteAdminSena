<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'Home.home')->name('home');
Route::view('/quienes-somos', 'Home.about')->name('quienes-somos');

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