<?php

use App\Http\Controllers\AssetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AssetController::class, 'index'])->name('asset.index');

Route::get('/create', [AssetController::class, 'create'])->name('asset.create');

Route::post('/store', [AssetController::class, 'store'])->name('asset.store');

Route::get('/destroy/{id}', [AssetController::class, 'destroy'])->name('asset.destroy');

Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('asset.edit');

Route::post('/update/{id}', [AssetController::class, 'update'])->name('asset.update');