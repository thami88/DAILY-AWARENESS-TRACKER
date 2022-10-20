<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Support\Facades\DB;

class JournalController extends Controller
{
    public function index()
    {
        $journals = DB::table('journals')
            ->Join('scores', 'journals.score_id', '=', 'scores.id')
            ->select('journals.*', 'scores.quality_score')
            ->where('journals.user_id', auth()->id())
            ->paginate(5);
        return view('dashboard', ['journals' => $journals]);
    }

    public function create()
    {
        $scores = DB::table('scores')
            ->select('scores.*')
            ->where('scores.user_id', auth()->id())
            ->get();

        return view('journals.create', ['scores' => $scores]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'work_hours' => 'required',
            'score_id' => 'required',
            'note' => 'required|max:255',
        ]);

        $attributes['user_id'] = auth()->id();

        Journal::create($attributes);

        return redirect('/dashboard')->with('success', 'Journal Entry Added!');
    }

    public function edit(Journal $journal)
    {
        $scores = DB::table('scores')
            ->select('scores.*')
            ->where('scores.user_id', auth()->id())
            ->get();


        return view('journals.update', ['journal' => $journal], ['scores' => $scores]);
    }

    public function update(Journal $journal)
    {
        $attributes = request()->validate([
            'work_hours' => 'required',
            'score_id' => 'required',
            'note' => 'required',
        ]);

        $journal->update($attributes);

        return redirect('/dashboard')->with('success', 'Journal Entry Updated!');
    }

    public function delete(Journal $journal)
    {
        $journal->delete();
        return back()->with('success', 'Journal Entry Deleted!');
    }
}
