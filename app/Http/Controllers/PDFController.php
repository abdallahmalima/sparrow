<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    //
    public function export(){
        $pdf=PDF::loadVIew('pdf.test',['services'=>Service::all()]);
        return $pdf->stream('test.pdf');
    }
}
