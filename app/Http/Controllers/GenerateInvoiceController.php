<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GenerateInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function show(Team $team)
    {

        $billingAddress = auth()->user()->billing_address;


        $pdf = PDF::loadView('invoices.show', ['team' => $team, 'billingAddress' => $billingAddress]);
        return $pdf->stream('invoice.pdf');
    }

    public function mail(Team $team)
    {
        $billingAddress = auth()->user()->billing_address;

        if (!file_exists(storage_path('invoices'))) {
            mkdir(storage_path('invoices'), 0777, true);
        }

        $pdf = PDF::loadView('invoices.show', ['team' => $team, 'billingAddress' => $billingAddress]);
        $pdf->save(storage_path('invoices/' . $team->name . '-' . now()->format('Y-m-d') . '.pdf'));


        return redirect()->route('teams.index')->with('message', "L'envoi de la facture pour l'équipe $team->name a bien été effectué.");
    }

    public function __invoke(Team $team)
    {

        $billingAddress = auth()->user()->billing_address;

        $pdf = PDF::loadView('invoices.index', ['team' => $team, 'billingAddress' => $billingAddress]);
        return $pdf->stream('invoice.pdf');
    }
}
