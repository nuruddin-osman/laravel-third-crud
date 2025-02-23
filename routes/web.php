<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('student.student');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';


Route::post('/submit_form', [PostController::class, 'post_data'])->name('submit_form');


Route::get("/read-student-data",[PostController::class,"read_data"])->name('read-student-data');

// Edit route
Route::get('/edit_data/{id}', [PostController::class, 'editMethod'])->name('edit_data');

// Update route
Route::post('/update_data/{id}', [PostController::class, 'updateMethod'])->name('update_data');


// web.php
Route::delete('/delete_data/{id}', [PostController::class, 'deleteMethod'])->name('delete_data');


Route::get('/restore/{id}', [PostController::class, 'restoreMethod'])->name('restore');


Route::get('/deleted-students', [PostController::class, 'showDeletedStudents'])->name('deleted-students');

Route::delete('/force_delete/{id}', [PostController::class, 'forceDeleteMethod'])->name('force_delete');
