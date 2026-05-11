<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AssetController::class, 'index'])->name('asset.index');

Route::get('/create', [AssetController::class, 'create'])->name('asset.create');

Route::post('/store', [AssetController::class, 'store'])->name('asset.store');

Route::get('/destroy/{id}', [AssetController::class, 'destroy'])->name('asset.destroy');

Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('asset.edit');

Route::post('/update/{id}', [AssetController::class, 'update'])->name('asset.update');

Route::get('/ticketing-it', [TicketController::class, 'index'])->name('ticket.index');

Route::get('/ticketing-it/create', [TicketController::class, 'create'])->name('ticket.create');

Route::post('/ticketing-it/store', [TicketController::class, 'store'])->name('ticket.store');

Route::get('/ticketing-it/destroy/{id}', [TicketController::class, 'destroy'])->name('ticket.destroy');

Route::get('/ticketing-it/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');

Route::post('/ticketing-it/update/{id}', [TicketController::class, 'update'])->name('ticket.update');