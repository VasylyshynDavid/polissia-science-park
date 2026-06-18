<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\ActivityController as AdminActivityController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\OpportunityController as AdminOpportunityController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');

Route::get('/opportunities', [OpportunityController::class, 'index'])->name('opportunities.index');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('sliders', AdminSliderController::class)->except(['show']);
        Route::resource('activities', AdminActivityController::class)->except(['show']);
        Route::resource('opportunities', AdminOpportunityController::class)->except(['show']);
        Route::resource('categories', AdminNewsCategoryController::class)->except(['show'])->parameters([
            'categories' => 'category',
        ]);
        Route::resource('news', AdminNewsController::class)->except(['show']);
    });
});
