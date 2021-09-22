<?php

use App\Http\Controllers\Admin\Tickets\AreaController;
use App\Http\Controllers\Admin\Tickets\UserController;
use Illuminate\Support\Facades\Route;


Route::get('', function () {
    return 'Hola administrador';
});
