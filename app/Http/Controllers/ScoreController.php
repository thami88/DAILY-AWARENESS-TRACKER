<?php

namespace App\Http\Controllers;

use App\Models\Score;

class ScoreController extends Controller
{
    public function index()
    {
        return view('qualityScore.manager', [
            'scores' => Score::all()->where('user_id', auth()->id())
        ]);
    }

    public function create()
    {
        return view('qualityScore.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'quality_score' => 'required|max:20',
            'description' => 'required|min:2|max:255',
        ]);

        $attributes['user_id'] = auth()->id();

        Score::create($attributes);

        return redirect('/score')->with('success', 'Quality Score Entry Stored!');
    }

    public function edit(Score $score)
    {
        return view('qualityScore.update', ['score' => $score]);
    }

    public function update(Score $score)
    {
        $attributes = request()->validate([
            'quality_score' => 'required',
            'description' => 'required',
        ]);

        $score->update($attributes);

        return redirect('/score')->with('success', 'Quality Score Entry Updated!');
    }

    public function delete(Score $score)
    {
        $score->delete();
        return back()->with('success', 'Quality Score Entry Deleted!');
    }
}
