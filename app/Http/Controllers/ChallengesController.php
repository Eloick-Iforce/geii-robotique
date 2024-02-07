<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('challenges.index', [
            'challenges' => Challenge::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('challenges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
            'price' => 'required',
        ]);

        Challenge::create($request->all());

        return redirect()->route('challenges.index')->with('message', 'Le challenge a bien été créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challenge $challenge)
    {
        //
    }
}
