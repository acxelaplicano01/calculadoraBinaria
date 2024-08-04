<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator', function () {
    return view('livewire.calculator');
});

Route::get('/converter', function () {
    return view('livewire.converter'); // Vista que cargará el componente Livewire
});
