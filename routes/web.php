<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [ProjectController::class, 'public'])->name('home');
Route::get('/projects', [ProjectController::class, 'projects'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('project.show');
Route::post('/message', [ProjectController::class, 'message_store'])->name('message.create');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProjectController::class, 'admin'])->name('dashboard');
    Route::resource('project', ProjectController::class)->only(['create', 'update', 'store', 'destroy', 'edit']);
    Route::get('/project/{project}/image', [ProjectController::class, 'image'])->name('image');
    Route::post('/project/{project}/image', [ProjectController::class, 'image_store'])->name('image.store');
    Route::delete('/project/{project}/image/{image}', [ProjectController::class, 'image_delete'])->name('image.destroy');
    Route::get('/message', [ProjectController::class, 'message'])->name('message');
    Route::get('/message/{message}', [ProjectController::class, 'message_show'])->name('message.show');
    Route::delete('/message/{message}', [ProjectController::class, 'message_destroy'])->name('message.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
