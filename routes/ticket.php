<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Tickets\AreaController;
use App\Http\Controllers\Admin\tickets\AssignmentController;
use App\Http\Controllers\Admin\Tickets\GroupSupportController;
use App\Http\Controllers\Admin\Tickets\HomeController;
use App\Http\Controllers\Admin\Tickets\TicketController;
use App\Http\Controllers\Admin\tickets\UserAssignmentController;
use App\Http\Controllers\Admin\Tickets\UserController;
use App\Models\UserAssignment;

//Route::get('/home', [HomeController::class, 'index'])->name("admin.ticket.index");
Route::resource('/', HomeController::class)->only('index')->names("admin.ticket.home"); 
Route::resource('/users', UserController::class)->names('admin.ticket.users');
Route::resource('/areas', AreaController::class)->names('admin.ticket.areas');
Route::resource('/groups', GroupSupportController::class)->names('admin.ticket.groups');
Route::resource('/tickets', TicketController::class)->names('admin.ticket.tickets');
Route::resource('/assignments', AssignmentController::class)->names('admin.ticket.assignments');
Route::resource('/userassignments', UserAssignmentController::class)->names('admin.ticket.userassignments');