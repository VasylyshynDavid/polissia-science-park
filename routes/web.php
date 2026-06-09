<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

// Прив'язуємо головну сторінку до нашого контролера
Route::get('/', [ActivityController::class, 'index']);
