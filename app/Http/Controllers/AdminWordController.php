<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Validation\Rule;
use App\Models\CorrectionSuggestion;
use Illuminate\Support\Facades\Auth;

class AdminWordController extends Controller
{
    public function index()
    {
        return view('admin.words.index', [
                'words' => Word::latest()->paginate(50)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('words.create');
    }

    public function store()
    {
        Word::create(array_merge($this->validateWord(), [
            'user_id' => request()->user()->id,
            // 'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Word $word)
    {
    if (!Auth::check()) {
            // Redirect to the login page with a message
            return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to create a new word.');
        }
        return view('words.edit', ['word' => $word]);
    }

    public function update(Word $word)
    {

    if (!Auth::check()) {
            // Redirect to the login page with a message
            return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to create a new word.');
        }
        $attributes = $this->validateWord($word);

        // if ($attributes['thumbnail'] ?? false) {
        //     $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        // }

        $word->update($attributes);

        return back()->with('success', 'Word Updated!');
    }

    public function destroy(Word $word)
    {
        if (!Auth::check()) {
            // Redirect to the login page with a message
            return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to create a new word.');
        }
        $word->delete();

        return back()->with('success', 'Word Deleted!');
    }






public function showCorrectionSuggestions()
{
    // Fetch all correction suggestions with pending status
    $correctionSuggestions = CorrectionSuggestion::get();

    return view('admin.words.approve-corrections', compact('correctionSuggestions'));
}


// WordController.php

public function processCorrection(CorrectionSuggestion $suggestion)
{
    // Validate the request, check permissions, etc.

    $action = request('action');

    if ($action === 'approve') {
        // Perform logic for approval
        $suggestion->status = 'approved';
        // Additional logic as needed
    } elseif ($action === 'decline') {
        // Perform logic for decline
        $suggestion->status = 'rejected';
        // Additional logic as needed
    }

    $suggestion->save();

    return redirect()->route('words.correctionSuggestions')->with('success', 'Correction suggestion processed.');
}



    protected function validateWord(?Word $word = null): array
    {
        $word ??= new Word();

        return request()->validate([
            'term' => 'required',
            // 'thumbnail' => $word->exists ? ['image'] : ['required', 'image'],
            'spell' => 'required',
            'exemple' => 'nullable',
            'type' => 'nullable',
            'uses' => 'nullable',
            'tifinagh' => 'nullable|string',
            'ar_meaning' => 'nullable',
            'fr_meaning' => 'nullable',
            'en_meaning' => 'nullable',
            'slangs' => 'required|array', // Ensure slangs is an array
            // 'slang_id' => 'required',
        ]);
    }
}
