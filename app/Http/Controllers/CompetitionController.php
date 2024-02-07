<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetitionRequest;
use App\Models\Competition;
use App\Models\Team;
use Illuminate\Http\Request;


/**
 * The CompetitionController class is responsible for handling HTTP requests related to competitions.
 */
class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $competitions = Competition::all();

        return view('competitions.index', [
            'competitions' => $competitions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $teams = Team::where('user_id', auth()->id())->orderBy('name')->get();
        return view('competitions.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompetitionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompetitionRequest $request)
    {
        $data = $request->validated();
        $competition = new Competition();
        $competition->fill($data);
        $competition->save();

        return redirect()->route('competitions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Competition $competition)
    {
        return view('competitions.show', compact('competition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Competition $competition)
    {
        return view('competitions.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompetitionRequest  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompetitionRequest $request, Competition $competition)
    {
        $data = $request->validated();
        $competition->fill($data);
        $competition->save();

        return redirect()->route('competitions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect()->route('competitions.index');
    }
}
