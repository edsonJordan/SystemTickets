<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Tickets\AreaController;
use App\Http\Controllers\Admin\Tickets\GroupSupportController;
use App\Http\Controllers\Admin\Tickets\HomeController;
use App\Http\Controllers\Admin\Tickets\TicketController;
use App\Http\Controllers\Admin\Tickets\UserController;

//Route::get('/home', [HomeController::class, 'index'])->name("admin.ticket.index");
Route::resource('/', HomeController::class)->names("admin.ticket"); 
Route::resource('/users', UserController::class)->names('admin.ticket.users');
Route::resource('/areas', AreaController::class)->names('admin.ticket.areas');
Route::resource('/groups', GroupSupportController::class)->names('admin.ticket.groups');
Route::resource('/tickets', TicketController::class)->names('admin.ticket.tickets');