<?php

use App\Http\Controllers\Admin\Tickets\AreaController;
use App\Http\Controllers\Admin\Tickets\UserController;
use Illuminate\Support\Facades\Route;


Route::get('', function () {
    return 'Hola administrador';
});

Route::resource('/ticket/users', UserController::class)->names('admin.ticket.users');
Route::resource('/ticket/areas', AreaController::class)->names('admin.ticket.areas');