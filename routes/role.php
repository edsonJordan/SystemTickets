<?php

use App\Http\Controllers\Admin\Role\RoleController;
use Illuminate\Support\Facades\Route;


//Route::get('/home', [HomeController::class, 'index'])->name("admin.ticket.index");

Route::get('/', [RoleController::class, 'index'])->name("admin.roles.index"); 
Route::get('{user}/edit', [RoleController::class, 'edit'])->name("admin.roles.edit"); 
Route::match(['put', 'patch'],'{user}/edit', [RoleController::class, 'update'])->name("admin.roles.update"); 


Route::get('/general/create', [RoleController::class, 'creategeneral'])->name("admin.roles.general.create"); 
Route::post('/general/store', [RoleController::class, 'storegeneral'])->name("admin.roles.general.store"); 
Route::get('{role}/general/edit', [RoleController::class, 'editgeneral'])->name("admin.roles.general.edit"); 
Route::delete('{role}/general/destroy', [RoleController::class, 'destroygeneral'])->name("admin.roles.general.destroy"); 
Route::match(['put', 'patch'],'{role}/general/update', [RoleController::class, 'updategeneral'])->name("admin.roles.general.update"); 
//Route::get('{user}/edit', [RoleController::class, 'edit'])->name("admin.roles.edit"); 

