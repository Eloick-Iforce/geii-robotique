<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Competition;
use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Competition $competition)
    {
        return view('challenges.create', [
            'competition_id' => $competition->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'points' => 'required',
            'competition_id' => 'required',
        ]);

        Challenge::create($request->all());

        return redirect()->route('competitions.show', $request->competition_id)->with('message', 'Le challenge a bien été créé.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        return view('challenges.edit', compact('challenge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Challenge $challenge)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'points' => 'required',
            'competition_id' => 'required',
        ]);

        $challenge->update($request->all());

        return redirect()->route('challenges.index')->with('message', 'Le challenge a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        $challenge->delete();

        return redirect()->route('challenges.index')->with('message', 'Le challenge a bien été supprimé.');
    }
}
