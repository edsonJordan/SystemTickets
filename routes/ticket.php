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
<<<<<<< HEAD
Route::resource('/', HomeController::class)->names("admin.ticket.home"); 

=======
Route::resource('/', HomeController::class)->only('index')->names("admin.ticket.home"); 
>>>>>>> 88e6f4efece2c4540ed3066978f1f639763da386
Route::resource('/users', UserController::class)->names('admin.ticket.users');

Route::resource('/areas', AreaController::class)->names('admin.ticket.areas');
Route::resource('/groups', GroupSupportController::class)->names('admin.ticket.groups');

Route::get('/tickets/mygroup', [TicketController::class, 'mygroup'])->name('admin.ticket.tickets.mygroup');
Route::get('/tickets/myticket', [TicketController::class, 'myticket'])->name('admin.ticket.tickets.myticket');

Route::resource('/tickets', TicketController::class)->names('admin.ticket.tickets');





Route::resource('/assignments', AssignmentController::class)->names('admin.ticket.assignments');
Route::resource('/userassignments', UserAssignmentController::class)->names('admin.ticket.userassignments');


//Route::get('/general/create', [RoleController::class, 'creategeneral'])->name("admin.roles.general.create"); 