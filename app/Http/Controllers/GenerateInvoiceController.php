<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;

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

        if (!file_exists(public_path('invoices'))) {
            mkdir(public_path('invoices'), 0777, true);
        }

        $pdf = PDF::loadView('invoices.show', ['team' => $team, 'billingAddress' => $billingAddress]);
        $fileName = $team->name . '-' . now()->format('Y-m-d') . '.pdf';
        $pdf->save(public_path('invoices/' . $fileName));


        Resend::emails($fileName)->send([
            'from' => 'GEII Rencontres Robotique <geii-robotique@resend.dev>',
            'to' => [auth()->user()->email],
            'subject' => 'Voici votre facture pour l\'équipe ' . $team->name,
            'attachments' => [
                [
                    'content' => "Voici votre facture pour l'équipe " . $team->name . ".",
                    'filename' => $fileName,
                    'path' => asset('invoices/' . $fileName),
                ]
            ],
            'html' => view('invoices.mail')->render(),
        ]);
        return redirect()->route('teams.index')->with('message', "L'envoi de la facture pour l'équipe $team->name a bien été effectué.");
    }

    public function __invoke(Team $team)
    {

        $billingAddress = auth()->user()->billing_address;

        $pdf = PDF::loadView('invoices.index', ['team' => $team, 'billingAddress' => $billingAddress]);
        return $pdf->stream('invoice.pdf');
    }
}
