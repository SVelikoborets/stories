<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [StoryController::class, 'index'])->name('main');
Route::get('/create', [StoryController::class, 'create'])->name('create');
Route::post('/create', [StoryController::class, 'store'])->name('store');

Route::get('/story/{tag}', [StoryController::class, 'showByTag'])->name('story.tags');
Route::get('/{story}', [StoryController::class, 'show'])->whereNumber('story')->name('story');

Auth::routes();

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/register', [AdminController::class, 'newAdmin'])->name('new_admin');
Route::post('/add', [AdminController::class, 'addAdmin'])->name('add');
Route::get('/admin/{story}', [AdminController::class, 'show'])->whereNumber('story')->name('admin.story');
Route::get('/tag/{tag}', [AdminController::class, 'showByTag'])->name('admin.tags');

Route::get('/approve/{story}', [App\Http\Controllers\AdminController::class, 'approve'])->name('approve');
Route::get('/reject/{story}', [App\Http\Controllers\AdminController::class, 'reject'])->name('reject');
