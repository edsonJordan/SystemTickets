<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Tickets\HomeController;

//Route::get('/home', [HomeController::class, 'index'])->name("admin.ticket.index");
Route::resource('/', HomeController::class)->names("admin.ticket");
