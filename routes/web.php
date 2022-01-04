<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\StaterkitController;

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

Route::get('/', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
// Servicios
Route::resource('service', \App\Http\Controllers\ServiceController::class);
Route::resource('education', \App\Http\Controllers\EducationController::class);
Route::resource('experience', \App\Http\Controllers\ExperienceController::class);
Route::resource('project', \App\Http\Controllers\ProjectController::class);
Route::resource('client', \App\Http\Controllers\ClientController::class);
Route::resource('testimonial', \App\Http\Controllers\TestimonialController::class);
Route::resource('about', \App\Http\Controllers\AboutController::class);
Route::resource('message', \App\Http\Controllers\MessageController::class);
Route::resource('blog', \App\Http\Controllers\BlogController::class);
Route::resource('blog-category', \App\Http\Controllers\BlogCategoryController::class);
Route::resource('projects-category', \App\Http\Controllers\ProjectsCategoryController::class);
Route::resource('skill-category', \App\Http\Controllers\SkillCategoryController::class);
Route::resource('skill', \App\Http\Controllers\SkillController::class);
Route::resource('setting', \App\Http\Controllers\SettingController::class);