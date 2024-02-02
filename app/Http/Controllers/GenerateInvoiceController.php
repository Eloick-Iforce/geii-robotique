<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GenerateInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        $team = auth()->user()->team;
        $billingAddress = auth()->user()->billing_address;

        $pdf = PDF::loadView('invoices.index', ['team' => $team, 'billingAddress' => $billingAddress]);
        return $pdf->stream('invoice.pdf');
    }
}
