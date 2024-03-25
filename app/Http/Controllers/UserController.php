<?php

namespace App\Http\Controllers;

use App\Models\User;
use Resend\Laravel\Facades\Resend;

/**
 * Class UserController
 * 
 * This class is responsible for handling user-related operations.
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Delete a user.
     *
     * @param User $user The user to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Verify a user's account.
     *
     * @param User $user The user to be verified.
     * @return \Illuminate\Http\RedirectResponse The redirect response after verifying the user's account and sending an email.
     */
    public function verify(User $user)
    {
        Resend::emails()->send([
            'from' => 'GEII Rencontres Robotique <geii-robotique@eloick.fr>',
            'to' => [$user->email],
            'subject' => 'Votre compte est maintenant vérifié',
            'html' => "<p>Votre compte sur GEII Robotique est maintenant vérifié.</p>
                       <p>Vous pouvez maintenant vous reconnecter à votre compte.</p>"
        ]);
        $user->update([
            'is_verified' => true
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Unverify a user's account.
     *
     * @param User $user The user to be unverified.
     * @return \Illuminate\Http\RedirectResponse The redirect response after unverifying the user's account.
     */
    public function unverify(User $user)
    {
        $user->update([
            'is_verified' => false
        ]);

        return redirect()->route('users.index');
    }
}
