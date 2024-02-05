<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Http\Requests\TeamRequest;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::where('user_id', auth()->id())->orderBy('name')->get();

        return view('teams.index', [
            'teams' => $teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $competitions = Competition::all();

        return view('teams.create', [
            'competitions' => $competitions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $data = $request->validated();
        Team::create([
            'name' => $data['name'],
            'user_id' => auth()->id(),
            'number_of_members' => $data['number_of_members'],
            'competition_id' => $data['competition_id'],
            'number_of_robots_but1' => $data['number_of_robots_but1'],
            'number_of_robots_but2' => $data['number_of_robots_but2'],
            'number_of_robots_but3' => $data['number_of_robots_but3'],
            'number_of_teachers' => $data['number_of_teachers'],
        ]);

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team)
    {
        $data = $request->validated();
        $team->fill($data);
        $team->save();

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index');
    }
}
