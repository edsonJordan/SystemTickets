<?php

namespace App\Http\Controllers\Admin\Data\Export;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;


class PdfController extends Controller
{
    public function index()
    {
        return view('admin.data.export.index');
        /* return view('admin.data.export.pdf', compact('results')); */
        /* return view('admin.data.export.pdf', compact('results')); */
    }
    public function prueba()
    {
        $results = Ticket::select('user_id', 'status_id', 'tittle', 'created_at', 'updated_at')
        ->orderBy('created_at', 'DESC')->take(100)->get();/* 
        $pdf = PDF::loadView('admin.data.export.prueba', compact('results'))->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'Open Sans']); */
        $pdf = PDF::loadView('admin.data.export.prueba', compact('results'));
        return $pdf->stream('Pagina.pdf');
    }

}
