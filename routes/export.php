<?php

use App\Http\Controllers\Admin\Data\Export\PdfController;
use Illuminate\Support\Facades\Route;

//Route::get('/home', [HomeController::class, 'index'])->name("admin.ticket.index");
Route::get('/pdf', [PdfController::class, 'index'])->name("admin.data.export.index"); 
Route::get('/prueba', [PdfController::class, 'prueba'])->name("admin.data.export.prueba"); 