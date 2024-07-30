<?php

use App\Livewire\Conversiones;
use Illuminate\Support\Facades\Route;
use App\Livewire\Conversiones as CalConversiones;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/conversiones', CalConversiones::class)->name('conversiones');
});
