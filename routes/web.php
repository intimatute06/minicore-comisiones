<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteComisionesController;   

Route::get('/', [ReporteComisionesController::class, 'index']);
