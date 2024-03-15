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






public function indexCorrectionSuggestions()
{
    // Fetch all correction suggestions with pending status
    $correctionSuggestions = CorrectionSuggestion::get();

    return view('admin.words.index-corrections', compact('correctionSuggestions'));
}


// Add this method to AdminWordController
public function showCorrectionSuggestion($suggestion)
{

    $suggestion = CorrectionSuggestion::findOrFail($suggestion);
    $word = Word::findOrFail($suggestion->word_id);

    return view('admin.words.approve-corrections', compact('word','suggestion'));
}




// WordController.php

public function processCorrection(CorrectionSuggestion $suggestion)
{
    // Validate the request, check permissions, etc.

    $action = request('action');
    $originalWord = Word::findOrFail($suggestion->word_id);

    if ($action === 'approve') {
        // Update the original word with the suggestion values
        $originalWord->update([
            'term' => $suggestion->term,
            'spell' => $suggestion->spell,
            'tifinagh' => $suggestion->tifinagh,
            'ar_meaning' => $suggestion->ar_meaning,
            'fr_meaning' => $suggestion->fr_meaning,
            'en_meaning' => $suggestion->en_meaning,
            'type' => $suggestion->type,
            'uses' => $suggestion->uses,
            'exemple' => $suggestion->exemple,
        ]);

        // Decode the JSON array of slang IDs from the suggestion
        $slangIds = json_decode($suggestion->slangs, true);

        // Use the sync method to update the pivot table with the decoded slang IDs
        if (is_array($slangIds)) {
            $originalWord->slang()->sync($slangIds);
        }

        // Update the suggestion status to approved
        $suggestion->status = 'approved';
        $suggestion->save();

        return redirect()->route('words.show', $originalWord)->with('success', 'Correction suggestion approved.');
    } elseif ($action === 'decline') {
        // Logic for decline
        $suggestion->status = 'rejected';
        $suggestion->save();

        return redirect()->route('words.show', $originalWord)->with('success', 'Correction suggestion declined.');
    }

    return back()->with('error', 'Invalid action.');
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
