<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class DOMPdfController extends Controller
{
    public function index(){
        return view('dompdf.invoice');
    }

    public function pdf($type = 'stream'){
        $data = [
            'invoice_no' => 1002,
            'payment_status' => 'Paid'
        ];
        $pdf = PDF::loadView('dompdf.invoice-pdf',compact('data'));
        return $type == 'stream' ? $pdf->stream() : $pdf->download('invoice.pdf');
    }
}
