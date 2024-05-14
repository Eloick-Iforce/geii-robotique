<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;

/**
 * This controller is responsible for generating and handling invoices.
 */
class GenerateInvoiceController extends Controller
{
    /**
     * Display the invoice for a specific team.
     *
     * @param Team $team The team for which to generate the invoice.
     * @return \Illuminate\Http\Response The response containing the invoice PDF.
     */
    public function show(Team $team)
    {
        // Retrieve the billing address of the authenticated user
        $billingAddress = auth()->user()->billing_address;

        // Generate the invoice PDF using the 'invoices.show' view
        $pdf = PDF::loadView('invoices.show', ['team' => $team, 'billingAddress' => $billingAddress]);

        // Stream the PDF to the user's browser
        return $pdf->stream('invoice.pdf');
    }

    /**
     * Send the invoice for a specific team via email.
     *
     * @param Team $team The team for which to send the invoice.
     * @return \Illuminate\Http\RedirectResponse The redirect response after sending the invoice.
     */
    public function mail(Team $team)
    {
        // Retrieve the billing address of the authenticated user
        $billingAddress = auth()->user()->billing_address;

        // Create the 'invoices' directory if it doesn't exist
        if (!file_exists(public_path('invoices'))) {
            mkdir(public_path('invoices'), 0777, true);
        }

        // Generate the invoice PDF using the 'invoices.show' view
        $pdf = PDF::loadView('invoices.show', ['team' => $team, 'billingAddress' => $billingAddress]);

        // Generate a unique filename for the invoice PDF
        $fileName = $team->name . '-' . now()->format('Y-m-d') . '.pdf';

        $pdf->save(public_path('invoices/' . $fileName));

        $url_fichier = asset('invoices/' . $fileName);

        Resend::emails($url_fichier)->send([
            'from' => 'GEII Rencontres Robotique <geii-robotique@mmi-unistra.fr>',
            'to' => [auth()->user()->email, 'imbert@unistra.fr', "monique.thomas@u-bordeaux.fr", "frc@plateforme37.com"],
            'subject' => 'Voici votre devis pour l\'équipe ' . $team->name,
            'html' => view('invoices.mail', ['url' => $url_fichier])->render(),
        ]);

        $team->is_open_pdf = 1;
        $team->save();

        // Redirect the user to the teams index page with a success message
        return redirect()->route('teams.index')->with('message', "L'envoi du devis pour l'équipe $team->name a bien été effectué.");
    }


    public function recap(Team $team)
    {
        $billingAddress = auth()->user()->billing_address;

        $competitions = $team->competitions;

        return view('invoices.recap', ['team' => $team, 'billingAddress' => $billingAddress, 'competitions' => $competitions]);
    }

    /**
     * Display the invoice index page for a specific team.
     *
     * @param Team $team The team for which to display the invoice index page.
     * @return \Illuminate\Http\Response The response containing the invoice index PDF.
     */
    public function __invoke(Team $team)
    {
        // Retrieve the billing address of the authenticated user
        $billingAddress = auth()->user()->billing_address;

        // Generate the invoice index PDF using the 'invoices.index' view
        $pdf = PDF::loadView('invoices.index', ['team' => $team, 'billingAddress' => $billingAddress]);

        // Stream the PDF to the user's browser
        return $pdf->stream('invoice.pdf');
    }
}
